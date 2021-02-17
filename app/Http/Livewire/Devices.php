<?php

namespace App\Http\Livewire;

use App\Models\Device;
use Livewire\Component;
use Livewire\WithPagination;

class Devices extends Component
{
    use WithPagination;

    public $showModal = false;
    public $deviceId;
    public $device;
    public $modelDevice;
    public $nome;
    public $cliente;
    public $api_token;
    public $identificador;
    public $trial_host;
    public $noip_host;
    public $descricao;
    public $datepickerValue;
    public $vazao_acumulada;
    public $acionamentos_acumulado;
    public $tempo_compressor_acumulado;
    public $status_compressor;
    public $status_nivel;
    public $status_liga_sistema;
    public $status_bomba_transferencia;

    protected $paginationTheme = 'tailwind';

    protected $rules = [
        'device.nome' => 'required',
        'device.cliente' => 'required',
        'device.data_ativacao' => 'nullable|date:d/m/Y',
    ];

    public function render()
    {
        return view('livewire.devices', [
            'devices' => Device::latest()->paginate(5)
        ]);
    }

    public function edit($deviceId)
    {
        $this->showModal = true;
        $this->deviceId = $deviceId;
        $this->device = Device::find($deviceId);
    }

    public function create()
    {
        $this->showModal = true;
        $this->device = null;
        $this->deviceId = null;
    }

    public function save()
    {
        $this->validate();

        if (!is_null($this->deviceId)) {
            $this->device->save();
        } else {
            $this->modelDevice = Device::create($this->device);
            $this->device = Device::find($this->modelDevice->id);
            $this->modelDevice = null;
            $this->device->identificador = sprintf("iot-%03d", $this->device->id);
            $this->device->trial_host = sprintf("%s.trial.rio", $this->device->identificador);
            $this->device->noip_host = sprintf("trial-%s.ddns.net", $this->device->identificador);
            $this->device->api_token = auth()->user()->createToken($this->device->identificador, ["read","create","update"])->plainTextToken;
            $this->device->save();
        }
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function delete($deviceId)
    {
        $device = Device::find($deviceId);
        if ($device) {
            $device->delete();
        }
    }
}
