<li class="{{ $child->isActive ? 'active' : null }} dropdown{{ $child->hasSubItems ? '-submenu' : null }}">
	<a target="{{ $child->target }}" href="{{ $child->uri }}">
		<i class="{{ $child->class }}"></i>
		@if ($child->children and ! $child->hasSubItems)
		<span class="pull-right">
			<i class="fa fa-angle-down text"></i>
			<i class="fa fa-angle-up text-active"></i>
		</span>
		@endif

		<span>{{ $child->name }}</span>
	</a>

	@if ($child->children)
		<ul class="nav lt" role="menu">
		@each('platform/menus::widgets/nav/child', $child->children, 'child')
		</ul>
	@endif
</li>
