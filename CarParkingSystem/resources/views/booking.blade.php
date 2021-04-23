@extends('layouts.default')
@section('content')
  <!-- Modal -->
  <div id="myModal">
  <div class="modal fade" id="reserveModal" tabindex="-1" aria-labelledby="reserveModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="reserveModalLabel">Reservation</h5>
        </div>
        {{Form::open(['action'=>'ReservationController@store', 'method'=>'POST'])}}
            {{csrf_field()}}
            <input id="selected-id" type="hidden" name="selected-id">
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                {{Form::submit('Reserve',['class'=>'btn btn-primary', 'data-toggle'=>'button'])}}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
            </div>
        </div>
        {{ Form::close() }}
  </div>
  <div id="myModal">
    <div class="modal fade" id="ongoingModal" tabindex="-1" aria-labelledby="ongoingModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="reserveModalLabel">ALERT</h5>
          </div>
                  <div class="modal-body">
                      You have an on-going reservation. Please cancel the on-going reservation first before you make a new one.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="window.location='{{ url('user')}}'">Check Reservation</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  </div>
              </div>
              </div>
          </div>
    </div>

  <div class="indicator">
  <h4>LEVEL 1 </h4> 
  <span class="green-dot"></span> Available &nbsp&nbsp&nbsp  
  <span class="yellow-dot"></span> Reserved &nbsp&nbsp&nbsp
  <span class="red-dot"></span> Occupied &nbsp&nbsp&nbsp 
  </div>
  @if($ongoing==TRUE)
  <p style="padding-left:100px; color:red;">*You have an on-going reservation. You are not allowed to make more than one reservation at the same time.</p>
  @else
  @endif

<div class="wrapper">
    <div class="ground">
        <div class="rowD">                   {{--ROW D--}}
                <div class="{{ $parkings[51]->class }}" id="D01" data-bs-toggle="modal" data-bs-target="#reserveModal" >
                    <div>D-01</div>
                </div>
                <div class="{{ $parkings[52]->class }}" id="D02" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-02</div>
                </div>
                <div class="{{ $parkings[53]->class }}" id="D03" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-03</div>
                </div>
                <div class="pillar">                   
                </div>
                <div class="{{ $parkings[54]->class }}" id="D04" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-04</div>
                </div>
                <div class="{{ $parkings[55]->class }}" id="D05" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-05</div>
                </div>
                <div class="{{ $parkings[56]->class }}" id="D06" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-06</div>
                </div>
                <div class="pillar">
                </div>
                <div class="{{ $parkings[57]->class }}" id="D07" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-07</div>
                </div>
                <div class="{{ $parkings[58]->class }}" id="D08" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-08</div>
                </div>
                <div class="{{ $parkings[59]->class }}" id="D09" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-09</div>
                </div>
                <div class="pillar">
                </div>
                <div class="{{ $parkings[60]->class }}" id="D10" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-10</div>
                </div>
                <div class="{{ $parkings[61]->class }}" id="D11" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-11</div>
                </div>
                <div class="{{ $parkings[62]->class }}" id="D12" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-12</div>
                </div>
                <div class="pillar">
                </div>
                <div class="rectangle"></div>
                <div class="triangle"></div>
                <div class="{{ $parkings[63]->class }}" id="D13" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-13</div>
                </div>
                <div class="{{ $parkings[64]->class }}" id="D14" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-14</div>
                </div>
                <div class="{{ $parkings[65]->class }}" id="D15" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-15</div>
                </div>
    
                <div class="pillar">
                </div>
                <div class="{{ $parkings[66]->class }}" id="D16" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-16</div>
                </div>
                <div class="{{ $parkings[67]->class }}" id="D17" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-17</div>
                </div>
                <div class="{{ $parkings[68]->class }}" id="D18" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-18</div>
                </div>
                <div class="pillar">
                </div>
                <div class="{{ $parkings[69]->class }}" id="D19" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-19</div>
                </div>
                <div class="{{ $parkings[70]->class }}" id="D20" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-20</div>
                </div>
                <div class="{{ $parkings[71]->class }}" id="D21" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-21</div>
                </div>
                <div class="pillar">
                </div>
                <div class="{{ $parkings[72]->class }}" id="D22" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-22</div>
                </div>
                <div class="{{ $parkings[73]->class }}" id="D23" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-23</div>
                </div>
                <div class="{{ $parkings[74]->class }}" id="D24" data-bs-toggle="modal" data-bs-target="#reserveModal">
                    <div>D-24</div>
                </div>
                <div class="pillar">
                </div>
        </div>
        <div class="driveway">
            <div class="corner1"></div>  
            <div class="road">
            <img src="arrow-right.svg" class="arrow-icon" alt="Arrow">
            <img src="arrow-right.svg" class="arrow-icon" alt="Arrow">
            <img src="arrow-right.svg" class="arrow-icon" alt="Arrow">
            <img src="arrow-right.svg" class="arrow-icon" alt="Arrow">
            <img src="arrow-right.svg" class="arrow-icon" alt="Arrow">
            <img src="arrow-right.svg" class="arrow-icon" alt="Arrow">
            <img src="arrow-right.svg" class="arrow-icon" alt="Arrow">
            <img src="arrow-right.svg" class="arrow-icon" alt="Arrow">
            <img src="arrow-right.svg" class="arrow-icon" alt="Arrow">
            <img src="arrow-right.svg" class="arrow-icon" alt="Arrow">
            <img src="arrow-right.svg" class="arrow-icon" alt="Arrow">
            <img src="arrow-right.svg" class="arrow-icon" alt="Arrow">
            <img src="arrow-right.svg" class="arrow-icon" alt="Arrow">
            <img src="arrow-right.svg" class="arrow-icon" alt="Arrow">
            <img src="arrow-right.svg" class="arrow-icon" alt="Arrow">
            <img src="arrow-right.svg" class="arrow-icon" alt="Arrow">
            <img src="arrow-right.svg" class="arrow-icon" alt="Arrow">
            <img src="arrow-right.svg" class="arrow-icon" alt="Arrow">
            <img src="arrow-right.svg" class="arrow-icon" alt="Arrow">
            </div>
            <div class="out"><div>OUT</div></div>
        </div>                      {{--DRIVEWAY--}}
        <div class="rowC">                                {{--ROW C--}}
            <div class="vertical-road"> 
                <img src="arrow-up.svg" class="arrow-icon" alt="Arrow">
            </div>
            <div class="{{ $parkings[33]->class }}" id="C01" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>C-01</div>
            </div>
            <div class="{{ $parkings[34]->class }}" id="C02" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>C-02</div>
            </div>
            <div class="{{ $parkings[35]->class }}" id="C03" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>C-03</div>
            </div>
            <div class="pillar">
            </div>
            <div class="{{ $parkings[36]->class }}" id="C04" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>C-04</div>
            </div>
            <div class="{{ $parkings[37]->class }}" id="C05" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>C-05</div>
            </div>
            <div class="{{ $parkings[38]->class }}" id="C06" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>C-06</div>
            </div>
            <div class="pillar">
            </div>
            <div class="{{ $parkings[39]->class }}" id="C07" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>C-07</div>
            </div>
            <div class="{{ $parkings[40]->class }}" id="C08" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>C-08</div>
            </div>
            <div class="{{ $parkings[41]->class }}" id="C09" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>C-09</div>
            </div>
            <div class="pillar">
            </div>
            <div class="{{ $parkings[42]->class }}" id="C10" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>C-10</div>
            </div>
            <div class="{{ $parkings[43]->class }}" id="C11" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>C-11</div>
            </div>
            <div class="{{ $parkings[44]->class }}" id="C12" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>C-12</div>
            </div>
            <div class="pillar">
            </div>

            <div class="{{ $parkings[45]->class }}" id="C13" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>C-13</div>
            </div>
            <div class="{{ $parkings[46]->class }}" id="C14" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>C-14</div>
            </div>
            <div class="{{ $parkings[47]->class }}" id="C15" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>C-15</div>
            </div>

            <div class="pillar">
            </div>
            <div class="{{ $parkings[48]->class }}" id="C16" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>C-16</div>
            </div>
            <div class="{{ $parkings[49]->class }}" id="C17" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>C-17</div>
            </div>
            <div class="{{ $parkings[50]->class }}" id="C18" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>C-18</div>
            </div>
            <div class="pillar">
            </div>
            <div class="vertical-road-right-p1">
                <img src="arrow-down.svg" class="arrow-icon" alt="Arrow">
            </div>
            <div class="border1"></div>
            <div class="vertical-road-right-p1">
                <img src="arrow-down.svg" class="arrow-icon" alt="Arrow">
            </div>
            <div class="jazz">
                <img src="elevator.svg" class="arrow-icon" alt="Arrow">
            </div>
        </div>
        <div class="rowB">                                {{--ROW B--}}
            <div class="vertical-road">  
                <img src="arrow-up.svg" class="arrow-icon" alt="Arrow">
            </div>
            <div class="{{ $parkings[15]->class }}" id="B01" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>B-01</div>
            </div>
            <div class="{{ $parkings[16]->class }}" id="B02" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>B-02</div>
            </div>
            <div class="{{ $parkings[17]->class }}" id="B03" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>B-03</div>
            </div>
            <div class="pillar">
            </div>
            <div class="{{ $parkings[18]->class }}" id="B04" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>B-04</div>
            </div>
            <div class="{{ $parkings[19]->class }}" id="B05" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>B-05</div>
            </div>
            <div class="{{ $parkings[20]->class }}" id="B06" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>B-06</div>
            </div>
            <div class="pillar">
            </div>
            <div class="{{ $parkings[21]->class }}" id="B07" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>B-07</div>
            </div>
            <div class="{{ $parkings[22]->class }}" id="B08" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>B-08</div>
            </div>
            <div class="{{ $parkings[23]->class }}" id="B09" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>B-09</div>
            </div>
            <div class="pillar">
            </div>
            <div class="{{ $parkings[24]->class }}" id="B10" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>B-10</div>
            </div>
            <div class="{{ $parkings[25]->class }}" id="B11" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>B-11</div>
            </div>
            <div class="{{ $parkings[26]->class }}" id="B12" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>B-12</div>
            </div>
            <div class="pillar">
            </div>

            <div class="{{ $parkings[27]->class }}" id="B13" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>B-13</div>
            </div>
            <div class="{{ $parkings[28]->class }}" id="B14" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>B-14</div>
            </div>
            <div class="{{ $parkings[29]->class }}" id="B15" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>B-15</div>
            </div>

            <div class="pillar">
            </div>
            <div class="{{ $parkings[30]->class }}" id="B16" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>B-16</div>
            </div>
            <div class="{{ $parkings[31]->class }}" id="B17" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>B-17</div>
            </div>
            <div class="{{ $parkings[32]->class }}" id="B18" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>B-18</div>
            </div>
            <div class="pillar">
            </div>
            <div class="vertical-road-right-p2">
                <img src="arrow-down.svg" class="arrow-icon-aligned" alt="Arrow">
            </div>
            <div class="border2"></div>
            <div class="vertical-road-right-p2">
                <img src="arrow-down.svg" class="arrow-icon-aligned" alt="Arrow">
            </div>
            <div class="jazz">
                <div>JAZZ SUITES</div>
                <div>CONDOMINIUM</div>
            </div>
        </div>
        <div class="driveway">
            <div class="corner2"></div>  
            <div class="road-bottom-front">              
                <img src="arrow-left.svg" class="arrow-icon" alt="Arrow">
                <img src="arrow-left.svg" class="arrow-icon" alt="Arrow">
                <img src="arrow-left.svg" class="arrow-icon" alt="Arrow">
                <img src="arrow-left.svg" class="arrow-icon" alt="Arrow">
                <img src="arrow-left.svg" class="arrow-icon" alt="Arrow">
                <img src="arrow-left.svg" class="arrow-icon" alt="Arrow">
                <img src="arrow-left.svg" class="arrow-icon" alt="Arrow">
                <img src="arrow-left.svg" class="arrow-icon" alt="Arrow">
                <img src="arrow-left.svg" class="arrow-icon" alt="Arrow">
                <img src="arrow-left.svg" class="arrow-icon" alt="Arrow">
                <img src="arrow-left.svg" class="arrow-icon" alt="Arrow">
                <img src="arrow-left.svg" class="arrow-icon" alt="Arrow">
                <img src="arrow-left.svg" class="arrow-icon" alt="Arrow">
            </div>
            <div class="vertical-road-right-p3">
                <img src="arrow-left.svg" class="arrow-icon-aligned2" alt="Arrow">
            </div>
            <div class="road-bottom-back-short">
                <img src="arrow-left.svg" class="arrow-icon" alt="Arrow">
            </div>
            <div class="vertical-road-right-p3">
                <img src="arrow-left.svg" class="arrow-icon-aligned2" alt="Arrow">
            </div>
            <div class="road-bottom-back">
                <img src="arrow-left.svg" class="arrow-icon" alt="Arrow">
            </div>
            <div class="in"><div>IN</div></div>
        </div>                                        {{--DRIVEWAY--}}
        <div class="rowA">                            {{--ROW A--}}
            <div class="to-lvl2">
                <img src="arrow-down.svg" class="arrow-icon" alt="Arrow">
                <img src="arrow-down.svg" class="arrow-icon" alt="Arrow">
                <div class="lvl2">
                    <div>To P2</div>
                </div>
            </div>
            <div class="{{ $parkings[0]->class }}" id="A01" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>A-01</div>
            </div>
            <div class="{{ $parkings[1]->class }}" id="A02" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>A-02</div>
            </div>
            <div class="pillar">
            </div>
            <div class="{{ $parkings[2]->class }}" id="A03" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>A-03</div>
            </div>
            <div class="{{ $parkings[3]->class }}" id="A04" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>A-04</div>
            </div>
            <div class="shop-entrance">                 {{--Mall entrance--}}
                <img src="elevator.svg" class="mall" alt="Arrow">
                <div>
                    MALL 
                    ENTRANCE
                </div>
            </div>
            <div class="{{ $parkings[4]->class }}" id="A05" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>A-05</div>
            </div>
            <div class="{{ $parkings[5]->class }}" id="A06" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>A-06</div>
            </div>
            <div class="{{ $parkings[6]->class }}" id="A07" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>A-07</div>
            </div>
            <div class="pillar">
            </div>
            <div class="{{ $parkings[7]->class }}" id="A08" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>A-08</div>
            </div>
            <div class="{{ $parkings[8]->class }}" id="A09" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>A-09</div>
            </div>
            <div class="{{ $parkings[9]->class }}" id="A10" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>A-10</div>
            </div>
            <div class="pillar">
            </div>

            <div class="{{ $parkings[10]->class }}" id="A11" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>A-11</div>
            </div>
            <div class="{{ $parkings[11]->class }}" id="A12" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>A-12</div>
            </div>
            <div class="{{ $parkings[12]->class }}" id="A13" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>A-13</div>
            </div>

            <div class="pillar">
            </div>
            <div class="{{ $parkings[13]->class }}" id="A14" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>A-14</div>
            </div>
            <div class="shop-entrance2">                 {{--Mall entrance--}}
                <div>
                    MALL 
                    ENTRANCE
                </div>
            </div>
            <div class="shop-entrance2">                 {{--Mall entrance--}}
                <div>
                    SMOKING ROOM
                </div>
            </div>
            <div class="{{ $parkings[14]->class }}" id="A15" data-bs-toggle="modal" data-bs-target="#reserveModal">
                <div>A-15</div>
            </div>
            <div class="pillar">
            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous"></script>
<script>
    $(document).ready(function(data){
        // console.log(JSON.stringify((data)));
        // console.log(something);
        //         if (data.ongoing == "yes"){
        //             $('.green-box').prop('disabled', true);
        //         }else{
                    $(".green-box").click(function(event){
                        $("#selected-id").val(this.id);
                        $(".modal-body").html("Reserve for " + this.id + " parking?"); 
                        $('#myModal').modal('show');
                });
                // }
    })
</script>
@endsection

