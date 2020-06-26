@if ($story_orgs && sizeof($story_orgs) > 1)
<form class="pcc-story-filter" action="">
    <label for="org">{{ __( 'Show only stories by:', 'pcc' ) }}</label>
    <select name="org">
        @foreach ( $story_orgs as $org )
        <option value="{{ $org }}">{{ $org }}</option>
        @endforeach
    </select>
    <button type="submit">{{ __('Apply','pcc') }}</button>
    <button class="is-style-secondary" type="submit" name="clear" value="1">{{ __('Clear','pcc') }}</button>
</form>
@endif
