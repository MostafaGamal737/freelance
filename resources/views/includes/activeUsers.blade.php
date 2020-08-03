
          <div class="row">
            <div class="col-md-12">
              <div class="main-card mb-3 card">
                <div class="card-header">حالة العمليات
                  <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                      <button class="active btn btn-focus">الاسبوع الماضي</button>
                      <button class="btn btn-focus">الشهر الماضي</button>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">مسلسل</th>
                        <th>العميل</th>
                        <th class="text-center">مقدم الخدمه</th>
                        <th class="text-center">حالة العمليه</th>
                        <th class="text-center">الفعل</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach (App\order::paginate(6) as $order)


                      <tr>
                        <td class="text-center text-muted">{{$order->id}}</td>
                        <td>
                          <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                              <div class="widget-content-left mr-3">
                                <div class="widget-content-left">
                                  <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                </div>
                              </div>
                              <div class="widget-content-left flex2">
                                <div class="widget-heading">{{$order->user->name}}</div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="text-center">{{$order->invoice->provider_name}}</td>
                        <td class="text-center">
                          <div @if ($order->status==0)
                            class="badge badge-warning">
                            معلقه
                          @elseif($order->status==2)
                            class="badge badge-success">
                            ناجحه
                        @elseif($order->status==-1)
                            class="badge badge-danger">
                            فاشلة
                          @elseif ($order->status==1)
                            class="badge badge-primary">
                            قيد التنفيذ
                          @endif
                        </div>
                        </td>
                        <td class="text-center">
                          <a href="{{asset('Dashboard/orders')}}/{{$order->id}}"  id="PopoverCustomT-1" class="btn btn-primary btn-sm">التفاصيل</a>
                        </td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="d-block text-center card-footer">
                    <button class="btn-wide btn ">{{App\order::paginate(1)->links()}}</button>
                  </div>
                </div>
              </div>
            </div>
