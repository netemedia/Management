@if($order_field !== $order)
  <i aria-hidden="true" class="las la-caret-right"></i>
@elseif('ASC' === $direction)
  <i aria-hidden="true" class="las la-caret-up"></i>
@else
  <i aria-hidden="true" class="las la-caret-down"></i>
@endif
