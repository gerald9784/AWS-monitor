@extends('main')

@section('content')
<div class="row">
                    <div class="col-md-2 col-md-offset-10 nopadding">
                        <div class="panel small">
                            
                            <div class="">
                                
                            
                                <div class="row icon-list ionicon-list">

                                    <div class="col-md-12 nopadding"><i class="ion-ios7-circle-filled" style="font-size:20px; color:#a94442"></i>Critical Issues
                                    </div>
            
                                    <div class="col-md-12 nopadding"><i class="ion-ios7-circle-filled" style="font-size:20px; color:#F7CA18"></i>Non Critical Issues
                                    </div>
                                    <div class="col-md-12 nopadding"><div>
                                    <i class="ion-ios7-circle-filled" style="font-size:20px; color:#2b542c"></i>No issues on Station
                                    </div>
                                    
                                    


                                </div> <!-- End row -->
                            </div> <!-- end panel-body -->
                        </div> <!-- Panel-default-->
                    </div> <!-- col-->
                </div>
              </div>

<div class="row" style= "margin-top:10px;">
<div class="row text-center">
                    @foreach($stations as $station)
                    
                    <?php $counter=0 ?>
                    <?php $flag=0 ?>
                    @foreach ($stations_with_problems as $problem)
                        @if($problem['id']== $station['station_id'])
                            @if($problem['category']=="Critical")
                            
                            @if($flag !=1)
                            <?php $flag=1 ?>
                            @endif
                            @endif
                            @if($problem['category']=="Non Critical")
                                
                                @if($flag !=1)
                                    <?php $flag=2 ?>
                                 @endif
                            @endif
                            <?php $counter++ ?>
                        @endif
                        
                    @endforeach
                    <div class="col-sm-5 col-md-2">
                        <div class="panel" style="max-height:160px; min-height:160px;">
                            <a href="{{URL::to('selectedStationStatus/'.$station['station_id'])}}">
                            <div class="h4 text-purple">{{$station['StationName']}}</div>
                            <span class="text-muted">{{$counter}}</span>
                            @if($flag ==0)
                            <div class="text-right">
                              <i class="ion-ios7-circle-filled" style="font-size:30px; color:#2b542c"></i>
                            </div>
                            @endif
                            @if($flag ==1)
                            <div class="text-right">
                              <i class="ion-ios7-circle-filled" style="font-size:30px; color:#a94442"></i>
                            </div>
                            @endif
                            @if($flag==2)
                            <div class="text-right">
                              <i class="ion-ios7-circle-filled" style="font-size:30px; color:#F7CA18"></i>
                            </div>
                            @endif
                            
                            </a>
                    </div>
                          
                    

                </div>
                @endforeach
                <div class="row text-center">
                    @foreach($stationsOn as $station)
                    
                    <div class="col-sm-5 col-md-2">
                        <div class="panel" style="max-height:160px; min-height:160px;">
                            <a href="{{URL::to('selectedStationStatus/'.$station['station_id'])}}">
                            <div class="h4 text-purple">{{$station['StationName']}}</div>
                            <span class="text-muted">0</span>
                           
                            <div class="text-right">
                              <i class="ion-ios7-circle-filled" style="font-size:30px; color:#2b542c"></i>
                            </div>
                            
                            
                            </a>
                    </div>
                          
                    

                </div>
                @endforeach 
                

               

               

               
</div>
@endsection