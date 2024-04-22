<div class="sidebar">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
  -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="javascript:void(0)" class="simple-text logo-mini">
                IM
            </a>
            <a href="javascript:void(0)" class="simple-text logo-normal">
                Menu
            </a>
        </div>
        <ul class="nav" id="side_nav">
            <li id="report_and_analytics">
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>Reports & Analytics</p>
                </a>
            </li>
            <li id="product_management">
                <a href="{{ route('product-management') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>Product Management</p>
                </a>
            </li>
            <li id="user_management">
                <a href="{{ route('user-management') }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>User Management</p>
                </a>
            </li>
            <li id="sales">
                <a href="#">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>Sales</p>
                </a>
            </li>
        </ul>
    </div>
</div>


<script>
    $(function () {
        active_nav = "{{ $data ?? '' }}";
        $("#" + active_nav).addClass('active');
    })
</script>



