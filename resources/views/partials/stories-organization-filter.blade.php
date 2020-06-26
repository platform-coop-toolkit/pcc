{{-- If on a taxonomy archive page, only show orgs relevant to the taxonomy.
  Otherwise show all story organizations. --}}
@if (is_tax())
@php $orgs = Taxonomy::getTermOrgs() @endphp
@else
@php $orgs = Page::getAllOrgs() @endphp
@endif

@if ($orgs && sizeof($orgs) > 1)
<form class="pcc-story-filter" action="">
    <label for="org">{{ __( 'Show only stories by:', 'pcc' ) }}</label>
    <select name="org">
        @foreach ( $orgs as $org )
        <option value="{{ $org }}">{{ $org }}</option>
        @endforeach
    </select>
    <button type="submit">Apply</button>

    {{-- TODO: Improve this implementation of Clear. All form data shouldn't be submitted. --}}
    <button class="is-style-secondary" type="submit" name="clear" value="1">Clear</button>
</form>
@endif
