<html>
<head>
	<title><?=$this->e($title)?></title>
	
	<!-- Semantic UI -->
	<link rel="stylesheet" type="text/css" href="/github-tool/vendor/semantic/ui/dist/semantic.min.css">
	<!-- Main Stylesheet -->
	<link rel="stylesheet" type="text/css" href="/github-tool/style.php/style.scss">
	
	<script src="/github-tool/vendor/components/jquery/jquery.min.js"></script>
	<script src="/github-tool/vendor/semantic/ui/dist/semantic.min.js"></script>
	<script src="/github-tool/assets/javascript/base.js"></script>
</head>
<body>

<?=$this->insert('partials/header')?>
	
<?=$this->section('content')?>
	
</body>
</html>