 <div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <li class="nav-item start {!! request()->is('admin/dashboard') ?'active open':'' !!} ">
                <a href="{{ route('admin.dashboard')}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">FACTS NEPAL Dashboard</span>
                    <span class="{!! request()->is('admin/dashboard') ?'selected':'' !!}"></span>
                    <span class="arrow open"></span>
                </a>
            </li>
            <!-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title">User</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="page_user_profile_1.html" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Profile 1</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <li class="nav-item {!! request()->is('admin/siteprofile') || request()->is('admin/siteprofile/edit') ?'active open':'' !!} ">
                <a href="javascript:void(0);" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">Site Profile Setting</span>
                    <span class="{!! request()->is('admin/siteprofile') || request()->is('admin/siteprofile/edit') ?'active open':'' !!}"></span>
                    <span class="arrow {!! request()->is('admin/siteprofile') || request()->is('admin/siteprofile/edit') ?'open':'' !!}"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {!! request()->is('admin/siteprofile/edit') ?'active open':'' !!}">
                        <a href="{{ route('admin.siteprofile.edit')}}" class="nav-link ">
                            <span class="title">Site Profile Update</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {!! request()->is('admin/facts') || request()->is('admin/factscategory') || request()->is('admin/facts/catlist') || request()->is('admin/facts/add') || request()->is('admin/facts/add') ?'active open':'' !!}  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Facts Manage</span>
                    <span class="{!! request()->is('admin/facts') || request()->is('admin/factscategory') || request()->is('admin/facts/catlist') || request()->is('admin/facts/add') || request()->is('admin/facts/add') ?'selected':'' !!}"></span>
                    <span class="arrow {!! request()->is('admin/facts') || request()->is('admin/factscategory') || request()->is('admin/facts/catlist') || request()->is('admin/facts/add') || request()->is('admin/facts/add') ?'active open':'' !!}"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {!! request()->is('admin/facts/add') ?'active open':'' !!} ">
                        <a href="{{ route('admin.facts.add')}}" class="nav-link ">
                            <span class="title">Add Facts</span>
                        </a>
                    </li>
                    <li class="nav-item {!! request()->is('admin/facts') ?'active open':'' !!}  ">
                        <a href="{{ route('admin.facts')}}" class="nav-link ">
                            <span class="title">Lists facts</span>
                        </a>
                    </li>
                    <li class="nav-item {!! request()->is('admin/factscategory') ?'active open':'' !!}  ">
                        <a href="{{ route('admin.factscategory')}}" class="nav-link ">
                            <span class="title">Facts Category</span>
                        </a>
                    </li>
                    <li class="nav-item {!! request()->is('admin/facts/catlist') ?'active open':'' !!}  ">
                        <a href="{{ route('admin.facts.catlist')}}" class="nav-link ">
                            <span class="title">Facts List</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {!! request()->is('admin/publicpolllist') || request()->is('admin/publicpoll/add') || request()->is('admin/facts/add') || request()->is('admin/facts/add') ?'active open':'' !!}  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-puzzle"></i>
                    <span class="title">Public Poll Manage</span>
                    <span class="{!! request()->is('admin/publicpolllist') || request()->is('admin/publicpoll/add') || request()->is('admin/facts/add')  ?'selected':'' !!}"></span>
                    <span class="arrow {!! request()->is('admin/facts') || request()->is('admin/publicpolllist') || request()->is('admin/publicpoll/add') ?'active open':'' !!}"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {!! request()->is('admin/publicpoll/add') ?'active open':'' !!} ">
                        <a href="{{ route('admin.publicpoll.add')}}" class="nav-link ">
                            <span class="title">Add Public Poll</span>
                        </a>
                    </li>
                    <li class="nav-item {!! request()->is('admin/publicpolllist') ?'active open':'' !!}  ">
                        <a href="{{ route('admin.publicpolllist')}}" class="nav-link ">
                            <span class="title">Public Poll Lists</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {!! request()->is('admin/surveylist') || request()->is('admin/survey/add') ?'active open':'' !!}  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">Srvey Manage</span>
                    <span class="{!! request()->is('admin/surveylist') || request()->is('admin/survey/add') ?'selected':'' !!} "></span>
                    <span class="arrow {{!! request()->is('admin/surveylist') || request()->is('admin/survey/add') ?'active open':'' !!} "></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {!! request()->is('admin/survey/add') ?'active open':'' !!} ">
                        <a href="{{ route('admin.survey.add')}}" class="nav-link ">
                            <span class="title">Add Srvey </span>
                        </a>
                    </li>
                    <li class="nav-item {!! request()->is('admin/surveylist') ?'active open':'' !!}  ">
                        <a href="{{ route('admin.surveylist')}}" class="nav-link ">
                            <span class="title">Srvey Lists</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>