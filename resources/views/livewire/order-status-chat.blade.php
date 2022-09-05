<div wire:poll>
    {{-- Success is as dangerous as failure. --}}
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: orange;color: #fff;padding: 10px;">
                <span class="glyphicon glyphicon-comment">{{$order->status}} : {{$isUser?'User' : 'Shop'}}</span>  
                
            </div>
            <div class="panel-body">
                <ul class="chat">
                    {{-- <li class="left clearfix"><span class="chat-img pull-left">
                 
                    </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font">Jane Doe</strong>  
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                dolor, quis ullamcorper ligula sodales.
                            </p>
                        </div>
                    </li> --}}
                    @foreach ($messages as $message)
                    <li class="{{$message->isUser?'left' : 'right'}} clearfix"><span class="chat-img pull-{{$message->isUser?'left' : 'right'}}">
                    </span>
                        <div class="chat-body clearfix" style="color:{{$message->isUser?'' : 'blue'}}">
                            <div class="header1"> 
                                <strong class="primary-font">{{$message->isUser?($order->customer->company??$order->customer->firstname.' '.$order->customer->surname) : ($order->shop->subdomain)}}</strong>
                                <span style="float: right;margin-right: 10px;">{{$message->created_at->diffForHumans()}}</span>
                            </div>
                            <p style="color:{{$message->isUser?'' : 'blue'}}">
                                {{$message->message}}
                            </p>
                        </div>
                    </li>    
                    @endforeach
                </ul>
            </div>
            <div class="panel-footer">
                <form wire:submit.prevent="submit">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." wire:model.defer="message"/>
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat" type="submit">
                                Send</button>
                        </span>
                       
                    </div>
                    @error('message')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </form>
                
            </div>
        </div>
    </div>
    
</div>


