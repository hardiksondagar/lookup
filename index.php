<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Hardik Sondagar">
	<meta name="description" content="Determines your IP address and shows information (host, location, whois, open ports) about any IP address entered. Look up to 10 neighbour ip address and hostname." />
	<meta name="keywords"	content="my ip address,ip address,ip addresses,ip,ip v4,ip v6,ipv4,ipv6,dynamic ip address,static ip address,dns,host,hostname,location,dhcp,whois,domain information,domain owner,firewall" />
	<link rel="icon" href="favicon.png">
	<title>Lookup</title>
	<!-- Bootstrap core CSS -->
	<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
</head>

<body ng-app="lookupApp" ng-controller="lookupCtrl">

	<div class="container">
		<div class="header clearfix">
			<nav>
				<ul class="nav nav-pills pull-right">
					<!-- <li role="presentation" class="active"><a href="#">Home</a></li> -->
					<!-- <li role="presentation"><a href="#">About</a></li> -->
					<!-- <li role="presentation"><a href="#">Contact</a></li> -->
				</ul>
			</nav>
			<h3 class="text-muted"><i class="fa fa-chevron-up "></i> Lookup</h3>
		</div>
		<div class="container">
			<form class="form-inline" id="lookupForm" ng-submit="submit()">
				<div class="form-group">
					<input type="text" ng-model="lookup" class="form-control input-lg" placeholder="Enter IP or Hostname" name="lookup" ng-required="true">
				</div>
				&nbsp;<button type="submit" class="btn btn-default btn-lg" id="lookupSubmit">Lookup</button>
			</form>
			
			<div class="result" ng-show="message.lookup" ng-cloak>
				<hr>
				<div class="panel panel-default">
					<div class="panel-heading">Address Info</div>
					<div class="panel-body">
						<div ng-bind-html="message.address"></div>
						<div ng-show="data.address" class="row">
							<div ng-repeat="(key,address) in data.address">
								<div class="col-xs-3">
									<strong>{{key}}</strong>
								</div>
								<div class="col-xs-9">
									<strong>{{address}}</strong>
								</div>
								<br>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Whois Details</div>
					<div class="panel-body">
						<div ng-bind-html="message.whois"></div>
						<div ng-show="data.whois.regrinfo.registered=='yes'" class="row">
							<div class="col-xs-3">
								<strong>Whois Details</strong>
							</div>
							<div class="col-xs-9">
								<div ng-repeat="(key,value) in data.whois.rawdata track by $index">
									{{value}}
								</div>
							</div>
							<div class="col-xs-3">
								<strong>NServer</strong>
							</div>
							<div class="col-xs-9">
								<div ng-repeat="(key,value) in data.whois.regrinfo.domain.nserver track by $index">
									{{key}}
									
								</div>
							</div>
						</div>
						<div ng-show="!message.whois && (!data.whois.regrinfo.registered || data.whois.regrinfo.registered=='unknown')" class="text-danger">
							<strong>Domain name is not registered.</strong>
						</div>
					</div>
				</div>
				<div class="panel panel-default" id="result-port">
					<div class="panel-heading">Open Ports</div>
					<div class="panel-body">
						<div ng-bind-html="message.portcheck"></div>
						<div ng-if="data.portcheck">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Port</th>
										<th>Name</th>
										<th>Status</th>
									</tr>
								</thead> 
								<tbody> 
									<tr ng-repeat="(key, port) in data.portcheck">
										<td>
											<span ng-show="port.is_open"  class="fa-stack fa-lg text-success">
												<i class="fa fa-circle fa-stack-2x"></i>
												<i class="fa fa-check fa-stack-1x fa-inverse"></i>
											</span>
											<span ng-hide="port.is_open" class="fa-stack fa-lg text-danger">
												<i class="fa fa-circle fa-stack-2x"></i>
												<i class="fa fa-times fa-stack-1x fa-inverse"></i>
											</span>
										</td>
										<td>
											{{key}}
										</td>
										<td>
											{{port.name}}
										</td>
										<td>
											{{port.is_open?'Open':'Filtered'}}
										</td>
										
									</tr> 
								</tbody>
							</table>
							<!-- <p ng-repeat="(key, port) in data.portcheck">
								<span ng-if="port.is_open" class="text-success">
									Port number <strong>{{key}}</strong> ({{port.name}}) is open
								</span>
								<span ng-hide="port.is_open" class="text-danger">
									Port number <strong>{{key}}</strong> ({{port.name}}) is close
								</span>
							</p> -->
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Meta Data</div>
					<div class="panel-body">
						<div ng-bind-html="message.meta"></div>
						<div ng-show="data.meta" class="row">
							<div ng-repeat="(key,meta) in data.meta">
								<div class="col-xs-3">
									<strong>{{key}}</strong>
								</div>
								<div class="col-xs-9">
									{{meta}}
								</div>
								<br>
							</div>
						</div>
					</div>
				</div>

				<div class="panel panel-default table-responsive">
					<div class="panel-heading">Neighbours</div>
					<div class="panel-body">
						<div ng-show="data.neighbour" class="row">
							<div ng-repeat="value in data.neighbour">
								<div class="col-lg-3  col-xs-6">
									<strong>{{value.IP}}</strong>
								</div>
								<div class="col-lg-8 col-xs-6">
									{{value.Host}}
								</div>
								<br>
							</div>
						</div>
						<div ng-bind-html="message.neighbour"></div>

					</div>
				</div>

				
			</div>

		</div>
		<br>
		<br>


		<!-- <footer class="footer">
			<p>&copy; 2015 Lookup, Inc.</p>
		</footer> -->

	</div> <!-- /container -->
	<script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="bower_components/angular/angular.min.js"></script>
	<script type="text/javascript" src="bower_components/angular-sanitize/angular-sanitize.min.js"></script>
	
	<script>
		var app = angular.module('lookupApp',['ngSanitize']);
		app.controller('lookupCtrl', function($scope,  $http) {

			$scope.portcheck=[];
			$scope.message=[];
			$scope.data=[];
			// $scope.lookup='hmmbiz.com';

			var config = {
				headers : {
					'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
				}
			}

			
			$scope.submit=function()
			{
				$scope.message=[];
				$scope.data=[];
				var query=$scope.lookup;
				$scope.message.lookup=true;
				$scope.portcheck(query);
				$scope.meta(query);
				$scope.address(query);
				$scope.whois(query);
				// $scope.neighbour(query);
			}

			$scope.address=function(query)
			{
				$scope.message.address='<p>Loadning <i class="fa fa-spinner fa-pulse"></i></p>';
				var data=$.param({query:query});
				$http.post("lib/address.php", data,config)
				.success(function(data, status) {
					$scope.message.address=null;
					$scope.data.address=data;
					
					var ip_splits=data.IP.split('.');
					var ip_prefix=ip_splits[0]+'.'+ip_splits[1]+'.'+ip_splits[2]+'.';
					
					$scope.data.neighbour=[];

					var start=(parseInt(ip_splits[3])-parseInt(5) > 0)?parseInt(ip_splits[3])-parseInt(5):0;
					var end=((parseInt(ip_splits[3])+parseInt(5)) < 256)?parseInt(ip_splits[3])+parseInt(5):255;
					for (var i=start; i<end; i++) {
						var ip=ip_prefix+i;
						$scope.neighbour(ip);
					}

				})
				.error(function()
				{
					$scope.message.address='No information available';
				});
			}

			$scope.portcheck=function(query)
			{
				$scope.message.portcheck='<p>Loadning <i class="fa fa-spinner fa-pulse"></i></p>';
				var data=$.param({query:query});
				$http.post("lib/portcheck.php", data,config)
				.success(function(data, status) {
					$scope.message.portcheck=null;
					$scope.data.portcheck=data;

				})
				.error(function()
				{
					$scope.message.portcheck='No information available';
				});
			}

			$scope.meta=function(query)
			{
				$scope.message.meta='<p>Loadning <i class="fa fa-spinner fa-pulse"></i></p>';
				var data=$.param({query:query});
				$http.post("lib/meta.php", data,config)
				.success(function(data, status) {
					$scope.message.meta=null;
					$scope.data.meta=data;

				})
				.error(function()
				{
					$scope.message.meta='No information available';
				});
			}

			$scope.whois=function(query)
			{
				$scope.message.whois='<p>Loadning <i class="fa fa-spinner fa-pulse"></i></p>';
				var data=$.param({query:query});
				$http.post("lib/whois.php", data,config)
				.success(function(data, status) {
					$scope.message.whois=null;
					$scope.data.whois=data;

				})
				.error(function()
				{
					$scope.message.whois='No information available';
				});
			}

			$scope.neighbour=function(query)
			{
				$scope.message.neighbour='<p>Loadning <i class="fa fa-spinner fa-pulse"></i></p>';
				var data=$.param({query:query});
				$http.post("lib/address.php", data,config)
				.success(function(data, status) {
					$scope.message.neighbour=null;
					$scope.data.neighbour.push(data);
				})
				.error(function()
				{
					$scope.message.neighbour=null;
				});
			}



		});
</script>
</body>
</html>
