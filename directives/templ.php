<!-- <a href="#" class="list-group-item active">
	<h4 class="list-group-item-heading">{{person.name}}</h4>
	<p class="list-group-item-text">{{person.address}}</p>
</a> -->

<!-- when using scope in directiv -->
<!-- <a href="#" class="list-group-item active">
	<h4 class="list-group-item-heading">{{personName}}</h4>
	<p class="list-group-item-text">{{personAddress}}</p>
</a> -->

<!-- when in scope given object -->
<a href="#" class="list-group-item active">
	<h4 class="list-group-item-heading">{{personObject.name}}</h4>
	<p class="list-group-item-text">{{formatAddressFunc({aperson:personObject})}}</p>
</a>