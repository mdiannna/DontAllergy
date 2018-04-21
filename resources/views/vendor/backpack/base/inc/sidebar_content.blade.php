
<?php  
  $month = \Carbon\Carbon::now()->month;
  if($month == 1 || $month == 2 || $month == 12) {
    $currentSeason = 'Winter';
  }
  if($month == 3 || $month == 4 || $month == 5) {
    $currentSeason = 'Spring';
  }
  if($month == 6 || $month == 7 || $month == 8) {
    $currentSeason = 'Summer';
  }
  if($month == 9 || $month == 10 || $month == 11) {
    $currentSeason = 'Fall';
  }
  $currentSeasonId = 'App\Models\Season'::where('name', $currentSeason)->first()->id; 
?>

<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span>
@if(Auth::user()->allergies->pluck('season_id')->unique()->contains($currentSeasonId))
	&nbsp;<i class="fas fa-exclamation alert" style="color:red"></i>
@endif
</a></li>
<li><a href="{{ backpack_url('users') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
<li><a href="{{ backpack_url('roles') }}"><i class="fa fa-server"></i> <span>User roles</span></a></li>
<li><a href="{{ backpack_url('posts') }}"><i class="fa fa-connectdevelop"></i> <span>User Posts</span></span></a></li>
<li><a href="{{ backpack_url('groups') }}"><i class="fa fa-users"></i> <span>Groups</span></a></li>
<li><a href="{{ backpack_url('allergies') }}"><i class="fa fa-tencent-weibo"></i> <span>All allergies</span></a></li>
<li><a href="{{ backpack_url('allergens') }}"><i class="fa fa-bug"></i> <span>Allergens</span></a></li>
<li><a href="{{ backpack_url('foods') }}"><i class="fa fa-apple"></i> <span>Foods</span></a></li>
<li><a href="{{ backpack_url('environment_conditions') }}"><i class="fa fa-umbrella"></i> <span>Environment conditions</span></a></li>

<li><a href="{{ backpack_url('statistics') }}"><i class="fa fa-users"></i> <span>User statistics</span></a></li>
<li><a href="{{ backpack_url('statistics_types') }}"><i class="fa fa-pie-chart"></i> <span>Statistics Types</span></a></li>

<hr>

<li><a href="/my-allergies"><i class="fa fa-list"></i> <span>My allergies</span></a></li>
<li><a href="/add-allergy"><i class="fa fa-plus"></i> <span>Add allergy</span></a></li>
<li><a href="/my-statistics"><i class="fa fa-pie-chart"></i> <span>My statistics</span></a></li>

