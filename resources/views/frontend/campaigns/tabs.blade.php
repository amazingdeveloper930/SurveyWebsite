<ul class="nav nav-tabs tabs-dark" role="tablist">
	<li class="{{ Route::getCurrentRoute()->getName() == 'campaigns.edit' ? 'active' : NULL }}">
		<a href="{{ route('campaigns.edit', $entry->id) }}">@lang('frontend/campaigns.Survey_settings')</a>
	</li>
	<!--<li class="{{ in_array(Route::getCurrentRoute()->getName(), ['campaigns.questions', 'campaigns.questions.add']) ? "active" : NULL }}">
		<a href="{{ route('campaigns.questions', $entry->id) }}">Questions</a>
	</li>->
	<li class="{{ in_array(Route::getCurrentRoute()->getName(), ['campaigns.results', 'campaigns.cross_tabulation']) ? "active" : NULL }}">
		<a href="{{ route('campaigns.results', $entry->id) }}">Results</a>
	</li>-->
</ul>