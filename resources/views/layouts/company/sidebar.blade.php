<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="/dashboard"><i class="fa fa-home back-icon"></i> <span>Back to Home</span></a>
                </li>
                <li class="menu-title">Settings</li>
                <li class="active">
                    <a href="/company"><i class="fa fa-clipboard"></i> <span>Company Settings</span></a>
                </li>


                <li class="submenu">
                    <a href="#"><i class="fa fa-dashcube"></i> <span> Manage Operations </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li>
                            <a href="/manageDepartment">
                                {{--<i class="fa fa-folder"></i>--}}
                                <span>Manage Department</span></a>
                        </li>
                        <li>
                            <a href="/manageRole">
                                {{--<i class="fa fa-user-secret"></i>--}}
                                <span>Manage Role</span></a>
                        </li>
                        <li>
                            <a href="/manageStaff">
                                {{--<i class="fa fa-user-circle"></i>--}}
                                <span>Manage Staff</span></a>
                        </li>
                        <li>
                            <a href="/manageSickness">
                                {{--<i class="fa fa-user-circle"></i>--}}
                                <span>Manage Sickness</span></a>
                        </li>
                        <li>
                            <a href="/manageMedical">
                                {{--<i class="fa fa-user-circle"></i>--}}
                                <span>Manage Medical Test</span></a>
                        </li>
                        <li>
                            <a href="/manageexpensecat">
                                {{--<i class="fa fa-user-circle"></i>--}}
                                <span>Manage Expense Category</span></a>
                        </li>
                        {{--<li>--}}
                            {{--<a href="/managestockcat">--}}
                                {{--<i class="fa fa-user-circle"></i>--}}
                                {{--<span>Manage Stock Category</span></a>--}}
                        {{--</li>--}}
                        <li>
                            <a href="/managerolespermission">
                                {{--<i class="fa fa-user-circle"></i>--}}
                                <span>Manage Permission</span></a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ url('/manageDebtors') }}"><i class="fa fa-user-secret"></i><span>Manage Debtors</span></a>
                </li>

                <li>
                    <a href="{{ url('/manageDeactivated') }}"><i class="fa fa-user-secret"></i><span>Manage Deactivated Staff</span></a>
                </li>

                <li>
                    <a href="{{ url('/staffLogs') }}"><i class="fa fa-user-secret"></i><span>View Staff Logs</span></a>
                </li>
                {{--<li>--}}
                    {{--<a href="/managepatientfilesetup"><i class="fa fa-user-circle"></i><span>--}}
                            {{--Manage Patient File Info--}}
                        {{--</span></a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="localization.html"><i class="fa fa-clock-o"></i> <span>Localization</span></a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="theme-settings.html"><i class="fa fa-picture-o"></i> <span>Theme Settings</span></a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="roles-permissions.html"><i class="fa fa-key"></i> <span>Roles & Permissions</span></a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="email-settings.html"><i class="fa fa-envelope-o"></i> <span>Email Settings</span></a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="invoice-settings.html"><i class="fa fa-pencil-square-o"></i> <span>Invoice Settings</span></a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="salary-settings.html"><i class="fa fa-money"></i> <span>Salary Settings</span></a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="notifications-settings.html"><i class="fa fa-globe"></i> <span>Notifications</span></a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="change-password.html"><i class="fa fa-lock"></i> <span>Change Password</span></a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="leave-type.html"><i class="fa fa-cogs"></i> <span>Leave Type</span></a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </div>
</div>