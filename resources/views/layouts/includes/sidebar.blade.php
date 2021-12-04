@php
  $sn = adminId();  
@endphp
<div class="sidebar" id="sidebar"> 
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                @if (getAdmin($sn,'p1') == 1)
                    <li class="">
                        <a href="/admindashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                    </li>
                @endif
                @if (!getAdmin($sn,'p1') == 1)
                <li class="">
                    <a href="/staffprofile"><i class="fa fa-user"></i> <span>My Profile</span></a>
                </li>
                @endif
              
                @if (getAdmin($sn,'p1') == 1)
                
                <li class="submenu">
                    <a href="#"><i class="fa fa-user-circle"></i><span> Students </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                    
                        <li><a href="/addstudent"> <span>Add Student</span></a></li>
                        <li><a href="/viewstudents"> <span>View Students</span></a></li>
                        <li><a href="/cbtlog"> <span>Check CBTs Logs</span></a></li>
                    
                    
                    </ul>
                </li>


                <li class="submenu">
                    <a href="#"><i class="fa fa-user-circle"></i><span> Prospective Students </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="/student/prospective"> <span>Add Prospective Student</span></a></li>
                        <li><a href="/allprospectivestudent"> <span>View All</span></a></li>
                        <li><a href="/question/prospective"> <span>Set Exam questions</span></a></li>
                    </ul>
                </li>




                <li class="submenu">
                    <a href="#"><i class="fa fa-users"></i></i><span>Staffs </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="/addstaff"> <span>Add Staff</span></a></li>
                        <li><a href="/viewstaff"> <span>View All Staffs</span></a></li>
                        <li><a href="/assignsubject"> <span>Assign Subject</span></a></li>
                        
                    </ul>
                </li>




                <li class="submenu">
                    <a href="#"><i class="fa fa-clipboard"></i><span>Subject & Classes </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="/createclass"> <span>Add Class</span></a></li>
                        <li><a href="/subject"> <span>Add Subject</span></a></li>
                    </ul>
                </li>

                @endif

                    <li class="submenu">
                        <a href="#"><i class="fa fa-clipboard"></i><span>Lesson Notes </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            
                            <li><a href="/mysubject"> <span>Post Notes</span></a></li>
                            @if (getAdmin($sn,'p1') == 1)
                            <li><a href="/review"> <span>Review Notes</span></a></li>
                            @endif
                        </ul>
                    </li>

                    
                    <li class="submenu">
                        <a href="#"><i class="fa fa-clipboard"></i><span>School CBT </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            @if (getAdmin($sn,'p3') == 1)
                            <li><a href="/createtype"> <span>Create Exam Type</span></a></li>
                            <li><a href="/createexam"> <span>Create Examination</span></a></li>
                            <li><a href="/viewexam"> <span>Add Question</span></a></li>
                            @endif
                            {{-- @if (getAdmin($sn,'p1') == 1)
                                <li><a href="/viewexam"> <span>Review Question</span></a></li>
                            @endif

                            
                             --}}
                         
                        </ul>
                    </li>


                    <li class="submenu">
                        <a href="#"><i class="fa fa-clipboard"></i><span>Create Entrance Exam </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            @if (getAdmin($sn,'p3') == 1)
                            <li><a href="/createexam"> <span>Create Examination</span></a></li>
                            <li><a href="/viewexam"> <span>Add Question</span></a></li>
                            @endif
             
                         
                        </ul>
                    </li>




                    @if (getAdmin($sn,'level') == 10)
                    <li class="">
                        <a href="/permission"><i class="fa fa-power-off"></i> <span>Update Permission</span></a>
                    </li>
                    @endif
                    


               

                
            </ul>
        </div>
    </div>
</div>

