
<div class="col-md-4">
<div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-aqua-active">
        <h3 class="widget-user-username">{{$user->name}}</h3>
        <h5 class="widget-user-desc">{{$user->email}}</h5>
        </div>
        <div class="widget-user-image">
        <img class="img-circle" src="{{ asset('image/Ayo.jpg')}}" alt="{{$user->name}}">
        </div>
        <div class="box-footer">
                <div class="row">
                        <div class="col-sm-6 border-right">
                          <div class="description-block">
                            <h5 class="description-header">Gender</h5>
                            <span class="description-text">Female</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 border-right">
                          <div class="description-block">
                            <h5 class="description-header">Role</h5>
                            <span class="description-text">{!! $user->role['name'] !!}</span>
                          </div>
                          <!-- /.description-block -->
                        </div>



                <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                          {{-- <li><a href="www.facebook.com">Facebook Profile<span class="pull-right">View</span></a></li> --}}
                        <li>Joined <span class="pull-right">{!! $user->created_at->format('D, M, Y') !!}</span></li>
                        </ul>
                      </div>



          
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>
    </div>




