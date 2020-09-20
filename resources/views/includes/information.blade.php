<div class="app-main__outer">
<div class="app-main__inner">
  @php

  $money= new App\invoice();
  $usermoney= new App\order();
  @endphp
      <div class="row">
    <div class="col-md-6 col-xl-4">
      <div class="card mb-3 widget-content bg-info">
        <div class="widget-content-wrapper ">
          <div class="widget-content-left">
            <div class="widget-heading text-light">مجموع الخدمات</div>
            <div class="widget-subheading text-light">لدينا</div>
          </div>
          <div class="widget-content-right">
            <div class="widget-numbers text-light"><span>{{count(App\order::get())}}</span></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">
      <div class="card mb-3 widget-content bg-warning">
        <div class="widget-content-outer">
          <div class="widget-content-wrapper">
            <div class="widget-content-left">
              <div class="widget-heading " >مجموع الخدمات الجاريه</div>
              <div class="widget-subheading ">قيد التنفيذ</div>
            </div>
            <div class="widget-content-right">
              <div class="widget-numbers ">{{count(App\order::where('status', '1')->get())}}</div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="col-md-6 col-xl-4">
      <div class="card mb-3 widget-content bg-grow-early">
        <div class="widget-content-wrapper text-white">
          <div class="widget-content-left">
            <div class="widget-heading">مجموع الخدمات التامه</div>
            <div class="widget-subheading">وصول الطرفين الي اتفاق</div>
          </div>
          <div class="widget-content-right">
            <div class="widget-numbers text-white"><span>{{count(App\order::where('status', '2')->get())}}</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 col-xl-4">
      <div class="card mb-3 widget-content bg-danger">
        <div class="widget-content-wrapper text-white">
          <div class="widget-content-left">
            <div class="widget-heading">الامول الواجب سدادها</div>
            <div class="widget-subheading">اموال العمليات الجاريه والمعلقه</div>
          </div>
          <div class="widget-content-right">
            <div class="widget-numbers text-white"><span>{{$usermoney->usermoney()}}ريال</span></div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-xl-4">
      <div class="card mb-3 widget-content bg-success">
        <div class="widget-content-outer">
          <div class="widget-content-wrapper">
            <div class="widget-content-left">
              <div class="widget-heading text-light">مجموع الامول لدينا </div>
              <div class="widget-subheading text-light">صافي ربحنا</div>
            </div>
            <div class="widget-content-right">

              <div class="widget-numbers text-light">{{$money->appMoney()}}ريال</div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">
      <div class="card mb-3 widget-content bg-primary">
        <div class="widget-content-outer">
          <div class="widget-content-wrapper">
            <div class="widget-content-left">
              <div class="widget-heading text-light"> الاموال المحوله </div>
              <div class="widget-subheading text-light">مجموع الاموال المحوله الينا</div>
            </div>
            <div class="widget-content-right">
              <div class="widget-numbers text-light">{{$money->totalTransfers()}}ريال</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
      <div class="card mb-3 widget-content">
        <div class="widget-content-outer">
          <div class="widget-content-wrapper">
            <div class="widget-content-left">
              <div class="widget-heading">Income</div>
              <div class="widget-subheading">Expected totals</div>
            </div>
            <div class="widget-content-right">
              <div class="widget-numbers text-focus">$147</div>
            </div>
          </div>
          <div class="widget-progress-wrapper">
            <div class="progress-bar-sm progress-bar-animated-alt progress">
              <div class="progress-bar bg-info" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
            </div>
            <div class="progress-sub-label">
              <div class="sub-label-left">Expenses</div>
              <div class="sub-label-right">100%</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
