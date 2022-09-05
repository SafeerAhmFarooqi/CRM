<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Orders;
use App\Models\OrderStatusChat as OrderStatusChats;

class OrderStatusChat extends Component
{
    public $orderId;
    public $message='';
    public $isUser;

    protected $validationAttributes = [
        'message' => 'Message',
    ];

    protected $messages = [
        'required' => ':attribute is Required',        
    ];

    protected function rules()
    {
        return [
            'message' => ['required', 'string'],
        ];
    }

    public function submit()
    {
        $this->validate();

        $order=Orders::findOrFail($this->orderId);

        $message=OrderStatusChats::create([
            'order_id'=>$this->orderId,
            'shop_id'=>$order->shop->id,
            'isUser'=>$this->isUser,
            'message'=>$this->message,
        ]);

    }

    public function render()
    {
        $order=Orders::findOrFail($this->orderId);
        $messages=OrderStatusChats::where('order_id',$this->orderId)->where('shop_id',$order->user_id)->get();
        return view('livewire.order-status-chat',[
            'order'=>$order,
            'messages'=>$messages,
        ]);
    }
}
