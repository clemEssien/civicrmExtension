(function(angular, $, _) {

  angular.module('mytestext').config(function($routeProvider) {
      $routeProvider.when('/memberships', {
        controller: 'MytestextMembershipsCtrl',
        templateUrl: '~/mytestext/MembershipsCtrl.html',

        resolve: {
          membershipList: function(crmApi) {
            return crmApi('Membership', 'get', {
            sequential: true,
              return: ['id', 'membership_name','relationship_name','source','start_date','end_date',]
            });
          }
        }
      });
    }
  );

 
  angular.module('mytestext').controller('MytestextMembershipsCtrl', function($scope, crmApi, crmStatus, crmUiHelp, membershipList) {
    // The ts() and hs() functions help load strings for this module.
    var ts = $scope.ts = CRM.ts('mytestext');
    var hs = $scope.hs = crmUiHelp({file: 'CRM/mytestext/MembershipsCtrl'}); // See: templates/CRM/mytestext/MembershipsCtrl.hlp
	
	$scope.myMembership = membershipList.values; //initialise table records to membership records
		$scope.total = $scope.myMembership.length;
   
		$scope.dateSearch = function(start, end) 
		{
			 var newTableRecords = new FilteredRecords (start, end,membershipList.values);
			// if(isDateValid(start) && isDateValid(end))
			 //{
				 $scope.myMembership = newTableRecords.getNewTableData();
				 $scope.total = $scope.myMembership.length;
			// }
			/* else
			 {
				 alert("Date entered is invalid");	 
			 }*/
		 
		};
		
		$scope.sort = function(keyname){
		$scope.sortKey = keyname;   
		$scope.reverse = !$scope.reverse; 
	}
		
  })

})(angular, CRM.$, CRM._);


 <!-- Responsible for filtering when search button is clicked -->
 var FilteredRecords = function(startDate, endDate, membershipList) 
	{
		this.startDate = new Date(startDate);
		this.endDate = new Date(endDate);
		var tableRecordValues = [];
		FilteredRecords.prototype.getNewTableData = function() 
		{
			for(var members in membershipList)
			{ 
				 var id= membershipList[members].id;
				 var membership_name = membershipList[members].membership_name;
				 var source = membershipList[members].source;
				 var rel_name = membershipList[members].relationship_name;
				 var start = new Date(membershipList[members].start_date);
				 var end = new Date(membershipList[members].end_date);

				 if( dayDifference(start,this.startDate)>=0 &&  dayDifference(end,this.endDate)<=0 )
				 {	
					tableRecordValues.push(membershipList[members]);	   
				 }
			   
			 }
			 return tableRecordValues;			 
		 }//end function
	 }


<!-- calculates the difference between two dates -->
function dayDifference(firstDate, secondDate) 
{
   return Math.round(((firstDate-secondDate)/(1000*60*60*24)));
}	 


<!-- validates date input -->
function isDateValid(dateString)
{
	var d = new Date(dateString);
	if ( Object.prototype.toString.call(d) === "[object Date]" )
	{  
		  if ( isNaN( d.getTime() ) ) 
		  {  
			 return false;
		  }
		  else 
		  {
			return true;
		  }
	}
	else 
	{
		  return false;
	}
}		
