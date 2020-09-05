<div class="row">
  <div class="col-md-12">
    <div class="main-card mb-3 card">
      <div class="card-header">افضل مقدمي الخدمات
        <div class="btn-actions-pane-right">
          <div role="group" class="btn-group-sm btn-group">
            <button class="active btn btn-focus">افضل</button>
            <button class="btn btn-focus">10</button>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="align-middle mb-0 table table-buserless table-striped table-hover">
          <thead>
            <tr>
              <th class="text-center">مسلسل</th>
              <th>مقدم الخدمه</th>
              <th class="text-center">الوظيفه</th>
              <th class="text-center">عدد الخدمات</th>
              <th class="text-center">الفعل</th>
            </tr>
          </thead>
          <tbody>
            @foreach (App\user::where('role','مقدم خدمه')->paginate(10) as $user)


            <tr>
              <td class="text-center text-muted">{{$user->id}}</td>
              <td>
                <div class="widget-content p-0">
                  <div class="widget-content-wrapper">
                    <div class="widget-content-left mr-3">
                      <div class="widget-content-left">
                        <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                      </div>
                    </div>
                    <div class="widget-content-left flex2">
                      <div class="widget-heading">{{$user->name}}</div>
                    </div>
                  </div>
                </div>
              </td>
              <td class="text-center">{{$user->role}}</td>
              <td class="text-center">
                <div>{{count(App\order::where('provider_id',$user->id)->orwhere('user_id',$user->id)->get())}}
              </div>
              </td>
              <td class="text-center">
                <a href="{{asset('Dashboard/Users')}}/{{$user->id}}"  id="PopoverCustomT-1" class="btn btn-primary btn-sm">التفاصيل</a>
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
