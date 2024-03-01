<nav>
            <ul class="navbar-nav si-menu">
                <li style="position: relative; list-style: none;">
                    <a href="{{route('reporter-dashboard')}}" class="nav-link" style="display: flex; color: #0b2f66; align-items: center; text-decoration: none;  margin-left: -20px;">
                        <i class="fa fa-home " style=" height: 50px; font-size: 18px;  min-width: 80px; text-align: center; line-height: 50px;"></i>
                        <span class="" style="font-size: 20px; font-weight: 400; ">Dashboard</span>
                    </a>
                </li>
                <li style="position: relative; list-style: none; " >
                        <a href="{{route('reporterPost.create')}}" class="nav-link si-menu" style="color: #0b2f66; display: flex; align-items: center; margin-left: -20px;">
                            <i class="fa fa-book" style=" height: 50px; font-size: 18px;  min-width: 80px; text-align: center; line-height: 50px;"></i>
                            <span class="" style="font-size: 20px; font-weight: 400;" > Add Post</span>
                        </a>

                </li>
                <li style="position: relative; list-style: none;  margin-left: -6px; " class="dropdown dropdown-li">
                    <a href="#" style="color: #0b2f66; display: flex; align-items: center; margin-left: -15px;" class="nav-link dropdown-toggle si-menu" data-bs-toggle="dropdown">
                        <i class="fa fa-user" style=" height: 50px; font-size: 18px;  min-width: 80px; text-align: center; line-height: 50px;"></i>
                        <span class="" style="font-size: 20px; font-weight: 400;" >My Account</span>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="" class="dropdown-item fw-bold py-2">My profile</a></li>
                        <li><a href="" class="dropdown-item fw-bold py-2">My Comments</a></li>
                        <li><a href="" class="dropdown-item fw-bold py-2">Change Password</a></li>
                    </ul>

                </li>
                <li style="position: relative; list-style: none;  margin-left: -20px;">
                    <a href="{{route('user-logout')}}" class="si-menu" style="color: #0b2f66; display: flex; align-items: center; text-decoration: none;">
                        <i class="fa fa-arrow-circle-down" style=" height: 50px; font-size: 18px;  min-width: 80px; text-align: center; line-height: 50px;"></i>
                        <span class="" style="font-size: 20px; font-weight: 400;">Logout</span>
                    </a>
                </li>

            </ul>



</nav>
