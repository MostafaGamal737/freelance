<div class="app-main__outer">
<div class="app-main__inner">
      <div class="row">
    <div class="col-md-6 col-xl-4">
      <div class="card mb-3 widget-content bg-midnight-bloom">
        <div class="widget-content-wrapper text-white">
          <div class="widget-content-left">
            <div class="widget-heading">مجموع الطلبات</div>
            <div class="widget-subheading">هذه السنه</div>
          </div>
          <div class="widget-content-right">
            <div class="widget-numbers text-white"><span>{{count(App\order::get())}}</span></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">
      <div class="card mb-3 widget-content bg-arielle-smile">
        <div class="widget-content-wrapper text-white">
          <div class="widget-content-left">
            <div class="widget-heading">الاعضاء</div>
            <div class="widget-subheading">مجموع الاعضاء المسجلين لدينا</div>
          </div>
          <div class="widget-content-right">
            <div class="widget-numbers text-white"><span>{{count(App\user::get())}}</span></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">
      <div class="card mb-3 widget-content bg-grow-early">
        <div class="widget-content-wrapper text-white">
          <div class="widget-content-left">
            <div class="widget-heading">مجموع العمليات التامه</div>
            <div class="widget-subheading">وصول الطرفين الي اتفاق</div>
          </div>
          <div class="widget-content-right">
            <div class="widget-numbers text-white"><span>{{count(App\order::where('status', '1')->get())}}</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 col-xl-4">
      <div class="card mb-3 widget-content">
        <div class="widget-content-outer">
          <div class="widget-content-wrapper">
            <div class="widget-content-left">
              <div class="widget-heading">مجموع العمليات الجاريه</div>
              <div class="widget-subheading">قيد التنفيذ</div>
            </div>
            <div class="widget-content-right">
              <div class="widget-numbers text-success">{{count(App\order::where('status', '0')->get())}}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">
      <div class="card mb-3 widget-content">
        <div class="widget-content-outer">
          <div class="widget-content-wrapper">
            <div class="widget-content-left">
              <div class="widget-heading">مجموع الامول لدينا </div>
              <div class="widget-subheading">الخاصه بعمليات جاريه</div>
            </div>
            <div class="widget-content-right">
              <div class="widget-numbers text-warning">$3M</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">
      <div class="card mb-3 widget-content">
        <div class="widget-content-outer">
          <div class="widget-content-wrapper">
            <div class="widget-content-left">
              <div class="widget-heading">مجموع الاموال لدنيا </div>
              <div class="widget-subheading">نسبتنا الخاصه من العمليات</div>
            </div>
            <div class="widget-content-right">
              <div class="widget-numbers text-danger">45,9$</div>
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
