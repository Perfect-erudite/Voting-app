    <div class="col-md-2">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">

          <h3 class="profile-username text-center">{!! $category->name !!}</h3>

          <p class="text-muted text-center">Last Updated: {!! $category->updated_at->format('D, M, Y') !!}</p>

        </div>
        <!-- /.box-body --> 
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          {{-- Only voters should be able to see nomination and vote tab --}}
          @if(Auth::user()->role_id == 4)
            <li class="active"><a href="#nomination" data-toggle="tab" aria-expanded="true">My Nomination</a></li>
            <li><a href="#vote" data-toggle="tab" aria-expanded="false">My Vote</a></li>
          @endif

          
          <li class="
            @if(Auth::user()->role_id != 4)
                active
            @endif
          "><a href="#nominees" data-toggle="tab" aria-expanded="false">Nominees</a></li>

        </ul>

        <div class="tab-content">
            @if(Auth::user()->role_id == 4)
          <div class="active tab-pane" id="nomination">
              @if(!isset($hasNominatedBefore) || $hasNominatedBefore == 0)            
            <p><h3>Nominate a candidate</h3></p>
            <div class="row">
                {!! Form::open(['route' => 'nominations.store']) !!}

                    @include('nominations.fields')

                {!! Form::close() !!}
            </div>

            @else
            <div class="col-md-6">
              <h4>You have nominated already</h4>
                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-aqua-active">
                    <h3 class="widget-user-username">{{$nomination->name}}</h3>
                    <h5 class="widget-user-desc">{{$nomination->linked_url}}</h5>
                </div>
                {{-- <div class="widget-user-image">
                    <img class="img-circle" src="http://infyom.com/images/logo/blue_logo_150x150.jpg" alt="{{$user->name}}">
                </div> --}}
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-6 border-right">
                            <div class="description-block">
                                <h5 class="description-header">Gender</h5>
                                <span class="description-text">{{$nomination->gender}}</span>
                            </div>
                            <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Nominations</h5>
                                    <span class="description-text">{!! $nomination->no_of_nominations !!}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <div class="box-footer no-padding">
                                <ul class="nav nav-stacked">
                                  @if(isset($monimation->linkedin_url))
                                    <li><a href="{!! $nomination->linkedin_url !!}">Linkedin<span class="pull-right">Profile</span></a></li>
                                  @endif
                                    <li><b>Nominated on </b><span class="pull-right">{!! $nomination->created_at->format('D, M, Y') !!}</span></li>
                                    <li><b>Reason For Nomination: </b><span class="pull-right"> {!! $nomination->reason_for_nomination !!}</span></li>
                                    <li><b>Business Name: </b><span class="pull-right"> {!! $nomination->business_name !!}</span></li>
                                    <li><b>Bio: </b><span class="pull-right"> {!! $nomination->bio !!}</span></li>  
                                    <li><b>Selected By Admin: </b><span class="pull-right"> 
                                      @if($nomination->is_admin_selected)
                                          yes
                                      @else
                                          Not yet
                                      @endif
                                    </span></li>                                                                                                          
                                </ul>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
        
        @endif
          </div>
              <div class='tab-pane' id='vote'>

              </div>
            @endif


          </div>
          <div class="tab-pane" id="nominees">
            <h2>Selected Nominees</h3>
              @if(isset($nomiantionSelecteds))
            {{-- Selected nominees--}}
            <div class="box box-primary">
              <div class="box-body">
                      @include('nominations.selected-nominees')
              </div>
          </div>
          @else
            <p>There exist no selected nominee for voting</p>
          @endif

            @if(Auth::user()->role_id < 3)
              {{-- All nominees --}}
              <h3>All Nominees</h3>
              <p>Only Admin can see the list below</p>
              <div class="box box-primary">
                <div class="box-body">
                        @include('nominations.table')
                </div>
            </div>

            @endif

          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>

   

