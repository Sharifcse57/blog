@php
    $current_location=class_basename(Route::currentRouteAction());
    //dump($current_location);
@endphp

<div class="col-sm-3 col-md-2 sidebar  left-bar">
	<div class="panel-group" id="accordion-menu">
		<!-- ======================Admin Management start========================== -->

	    	<!-- Map start -->
            <div class="panel panel-default">
                <div class="panel-heading {{ check_menu_active($current_location,array('HomeController')) }}">
                @php $overview=''; @endphp
                @if($current_location=='HomeController@index')
                    @php $overview='color:red'; @endphp
                @endif
                    <h4 class="panel-title">
                    {{link_to_route('dashboard','Dashboard',null,array('style'=>$overview))}}
                    </h4>
                </div>
    		</div>
           <!-- Map end -->

    @if(checkMenuActive(['SiteSettingsController@edit'],$menu_list))
           <!-- Site Settings Management start -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    {{link_to('#site_settings_management',mystudy_case('site_settings_management'),array('data-toggle'=>'collapse','data-parent'=>'#accordion-menu'))}}
                    </h4>
                </div>
                <div id="site_settings_management" class="panel-collapse collapse {{ check_menu_active($current_location,array('SiteSettingsController')) }}">
                    <div class="panel-body panel-body-custom">
                        <ul class="left-bar-menu-ul">

                        @if(checkMenuActive('SiteSettingsController@edit',$menu_list))
                            <li id="SiteSettingsController_edit">{{ link_to_route('site_settings.edit','Edit Site Settings','1') }}</li>
                        @endif
                        </ul>
                    </div>
                </div>
            </div>
           <!-- Site Settings Management end -->
    @endif

    @if(checkMenuActive(['GeneralPagesController@create','GeneralPagesController@index'],$menu_list))
           <!-- General Pages Management start -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    {{link_to('#content_management',mystudy_case('content_management'),array('data-toggle'=>'collapse','data-parent'=>'#accordion-menu'))}}
                    </h4>
                </div>
                <div id="content_management" class="panel-collapse collapse {{ check_menu_active($current_location,array('GeneralPagesController')) }}">
                    <div class="panel-body panel-body-custom">
                        <ul class="left-bar-menu-ul">

                        @if(checkMenuActive('GeneralPagesController@create',$menu_list))
                            <li id="GeneralPagesController_create">{{ link_to_route('general_pages.create','Create New Page') }}</li>
                        @endif

                        @if(checkMenuActive('GeneralPagesController@index',$menu_list))
                            <li id="GeneralPagesController_index">{{ link_to_route('general_pages.index','List of Pages') }}</li>
                        @endif

                        </ul>
                    </div>
                </div>
            </div>
           <!-- Site Settings Management end -->
    @endif

     @if(checkMenuActive(['PromotionOffersController@create','PromotionOffersController@index'],$menu_list))
           <!-- PromotionOffers Management start -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    {{link_to('#promotion_offer_management',mystudy_case('promotion_offer_management'),array('data-toggle'=>'collapse','data-parent'=>'#accordion-menu'))}}
                    </h4>
                </div>
                <div id="promotion_offer_management" class="panel-collapse collapse {{ check_menu_active($current_location,array('PromotionOffersController')) }}">
                    <div class="panel-body panel-body-custom">
                        <ul class="left-bar-menu-ul">

                        @if(checkMenuActive('PromotionOffersController@create',$menu_list))
                            <li id="PromotionOffersController_create">{{ link_to_route('promotion_offers.create','Create New Offer') }}</li>
                        @endif

                        @if(checkMenuActive('PromotionOffersController@index',$menu_list))
                            <li id="GeneralPagesController_index">{{ link_to_route('promotion_offers.index','List of Offers') }}</li>
                        @endif

                        </ul>
                    </div>
                </div>
            </div>
           <!-- Site Settings Management end -->
    @endif


 @if(checkMenuActive(['RolesController@create','RolesController@index','RegisterController@showRegistrationForm','RegisterController@showUserLists'],$menu_list))
           <!-- User Management start -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    {{link_to('#user_management',mystudy_case('user_management'),array('data-toggle'=>'collapse','data-parent'=>'#accordion-menu'))}}
                    </h4>
                </div>
                <div id="user_management" class="panel-collapse collapse {{ check_menu_active($current_location,array('RolesController@create','RolesController@index','UsersController','RegisterController')) }}">
                    <div class="panel-body panel-body-custom">
                        <ul class="left-bar-menu-ul">

                        @if(checkMenuActive('RolesController@create',$menu_list))
                            <li id="RolesController_create">{{ link_to_route('roles.create','Role Create') }}</li>
                        @endif

                        @if(checkMenuActive('RolesController@index',$menu_list))
                            <li id="RolesController_index">{{ link_to_route('roles.index','Role lists') }}</li>
                        @endif

                        @if(checkMenuActive('RegisterController@showRegistrationForm',$menu_list))
                            <li id="RegisterController_showRegistrationForm">{{ link_to('/register','User Create') }}</li>
                        @endif

                        @if(checkMenuActive('RegisterController@showUserLists',$menu_list))
                            <li id="RegisterController_showUserLists">{{ link_to_route('users.index','User lists') }}</li>
                        @endif

                        </ul>
                    </div>
                </div>
            </div>
           <!-- User Management end -->
    @endif


     @if(checkMenuActive(['QuestionsController@create','QuestionsController@index'],$menu_list))
            <!-- Questions Management start -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    {{link_to('#questions_management',mystudy_case('questions_management'),array('data-toggle'=>'collapse','data-parent'=>'#accordion-menu'))}}
                    </h4>
                </div>
                <div id="questions_management" class="panel-collapse collapse {{ check_menu_active($current_location,array('QuestionsController')) }}">
                    <div class="panel-body panel-body-custom">
                        <ul class="left-bar-menu-ul">

                        @if(checkMenuActive('QuestionsController@create',$menu_list))
                            <li id="QuestionsController_create">{{ link_to_route('questions.create','New Questions') }}</li>
                        @endif

                        @if(checkMenuActive('QuestionsController@index',$menu_list))
                            <li id="QuestionsController_index">{{ link_to_route('questions.index','Questions lists') }}</li>
                        @endif

                        </ul>
                    </div>
                </div>
            </div>
           <!-- Questions Management end -->
    @endif

     @if(checkMenuActive(['TagsController@create'],$menu_list))
            <!-- Tags Management start -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    {{link_to('#tags_management',mystudy_case('tags_management'),array('data-toggle'=>'collapse','data-parent'=>'#accordion-menu'))}}
                    </h4>
                </div>
                <div id="tags_management" class="panel-collapse collapse {{ check_menu_active($current_location,array('TagsController')) }}">
                    <div class="panel-body panel-body-custom">
                        <ul class="left-bar-menu-ul">

                        @if(checkMenuActive('TagsController@create',$menu_list))
                            <li id="TagsController_create">{{ link_to_route('tags.create','New Tags') }}</li>
                        @endif

                        </ul>
                    </div>
                </div>
            </div>
           <!-- Tags Management end -->
    @endif

     @if(checkMenuActive(['CommentsController@create','CommentsController@index'],$menu_list))
            <!-- Comments Management start -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    {{link_to('#comments_management',mystudy_case('comments_management'),array('data-toggle'=>'collapse','data-parent'=>'#accordion-menu'))}}
                    </h4>
                </div>
                <div id="comments_management" class="panel-collapse collapse {{ check_menu_active($current_location,array('CommentsController')) }}">
                    <div class="panel-body panel-body-custom">
                        <ul class="left-bar-menu-ul">

                        @if(checkMenuActive('CommentsController@create',$menu_list))
                            <li id="CommentsController_create">{{ link_to_route('comments.create','New Comments') }}</li>
                        @endif

                        @if(checkMenuActive('CommentsController@index',$menu_list))
                            <li id="CommentsController_index">{{ link_to_route('comments.index','Comments lists') }}</li>
                        @endif

                        </ul>
                    </div>
                </div>
            </div>
           <!-- Comments Management end -->
    @endif

    @if(checkMenuActive('RequestCallsController@index',$menu_list))
           <!-- Request Call Management start -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    {{link_to('#request_call_management',mystudy_case('request_call_management'),array('data-toggle'=>'collapse','data-parent'=>'#accordion-menu'))}}
                    </h4>
                </div>
                <div id="request_call_management" class="panel-collapse collapse {{ check_menu_active($current_location,array('RequestCallsController@index')) }}">
                    <div class="panel-body panel-body-custom">
                        <ul class="left-bar-menu-ul">
                            <li id="RequestCallsController_index">{{ link_to_route('request_calls.index','List of Request Calls') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
           <!-- Subscription Management end -->
    @endif



         <!-- =============================Admin Management end=========================== -->
     </div>
 </div>

