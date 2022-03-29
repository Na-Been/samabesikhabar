@extends('backend.layouts.app')
@section('title','File Manager')
@section('content')

   <div class="content ">
       
       
       <div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        
        
        
        

                                                            <a class="breadcrumb--active" href="/backend">Backend</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right breadcrumb__icon"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                         Media
                            
        
   
    </div>
    <!-- END: Breadcrumb -->
        <div class="d-menu">
            <i class="fas fa-bars" id="d-menu-bar" style="font-size:20px;cursor:pointer"></i>
        </div>
    <div class="intro-x dropdown w-8 h-8 profile-image">
        
        
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in ">
                            <img alt="Dummy" src="http://samabesi.namunacomputer.com/image/profile/L1KSe5Kbc0Vt50fZ5pDo0JTfaWgW3hZF0TSB2pTv.png">
                    </div>
        <div class="dropdown-box w-56">
            <div class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white">
                <div class="p-4 border-b border-theme-40 dark:border-dark-3">
                    <div class="font-medium">Admin</div>
                    <div class="text-xs text-theme-41 dark:text-gray-600">admin@gmail.com</div>
                </div>
                <div class="p-2">
                    <a href="http://samabesi.namunacomputer.com/backend/profile" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user w-4 h-4 mr-2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Profile </a>
                    <a href="http://samabesi.namunacomputer.com" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout w-4 h-4 mr-2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg> View Site </a>
                    <a href="http://samabesi.namunacomputer.com/backend/profile" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock w-4 h-4 mr-2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> Change Password </a>
                </div>
                <div class="p-2 border-t border-theme-40 dark:border-dark-3">
                    <form method="POST" action="http://samabesi.namunacomputer.com/logout">
                        <input type="hidden" name="_token" value="QxjftM7KLo4DLTKdvL0q81vZT9DXJcawO9xTuqt7">                        <a href="route('logout')" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-toggle-right w-4 h-4 mr-2"><rect x="1" y="5" width="22" height="14" rx="7" ry="7"></rect><circle cx="16" cy="12" r="3"></circle></svg> Log out
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
       
        <iframe src="{{url('/').'/filemanager'}}" style="  width: 100%;
    height: 100vh;
    margin-top: 27px;
    border-radius: 32px;"></iframe>
   </div>
@endsection
