<label >Search</label>
<input type="text" value="Doe">

<h3>Search results</h3>
<div class="list-group" ng-repeat="person in people">
	<!-- when in scope given @ (text) -->
  <!-- <search-result person-name="{{person.name}}" person-address="{{person.address}}"></search-result> -->

	<!-- when in scope given = (object) -->
<search-result person-object="person" format-address-func="formatAddress(aperson)" "></search-result>


    		<!-- restrict E == element -->
  <!-- <div search-result></div> -->		   		<!-- restrict A == attribute -->
  <!-- <div class="search-result"></div> -->	    <!-- restrict C == class -->
</div>