@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Access Control Setting</div>
                <form action="{{ url('roles/update') }}" method="post">
                  <input type="hidden" name="id" value="{{ $role->id }}">
                {!! csrf_field() !!}
                <div class="panel-body">
                  <ul class="nav nav-tabs">
                    @foreach($menu_parent as $value)
                    <?php
                    $i++;
                    ?>
                    <li @if($i==1)class="active" @endif><a data-toggle="tab" href="#{{ $value->name }}">{{ $value->display_name }}</a></li>
                    @endforeach
                  </ul>

                  <div class="tab-content">
                    @foreach($menu_parent as $value)
                    <?php
                    $j++;
                    ?>
                    <div id="{{ $value->name }}" class="tab-pane fade @if($j==1)in active @endif">
                      <h3>{{ $value->display_name }}</h3>
                      <?php
                      $menu_child = App\Module::where('parent_id',$value->id)->get();
                      ?>
                      @foreach($menu_child as $child)
                      <div class="panel-group">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" href="#collapse-{{ $child->name }}">{{ $child->display_name }}</a>
                            </h4>
                          </div>
                          <div id="collapse-{{ $child->name }}" class="panel-collapse collapse in">
                            <div class="panel-body">
                              <?php
                              $permissions = App\Permission::where('module_id',$child->id)->get();
                              $count_check1 = App\Permission::where('module_id',$child->id)->count();
                              $count_check2 = App\PermissionRole::where('role_id',$role->id)->where('module_id',$child->id)->count();
                              ?>
                              @if(count($permissions)>1)
                              <div class="checkbox">
                                <label><input type="checkbox" id="check-{{ $child->id }}" onclick="checkAll('{{ $child->id }}')" @if($count_check1==$count_check2)checked @endif>CHECK ALL</label>
                              </div>
                              @endif
                              @foreach($permissions as $value)
                              <?php
                              $permission_role = App\PermissionRole::where('permission_id',$value->id)->where('role_id',$role->id)->count();
                              ?>
                              <div class="checkbox">
                                <label><input type="checkbox" value="{{ $value->id }}" name="permission_{{ $value->id }}" class="check-{{ $child->id }}" @if($permission_role>0)checked @endif>{{ $value->display_name }}</label>
                                <input type="hidden" name="module_{{ $value->module_id }}" value="{{ $value->module_id }}">
                              </div>
                              @endforeach
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                    @endforeach
                  </div>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
