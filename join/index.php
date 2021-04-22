<?php
// エラーチェック
if($_POST['name']===''){
	$error['name'] = 'blank';
}
if($_POST['email']===''){
	$error['email'] = 'blank';
}
if(strlen($_POST['password']) < 4){
	$error['password'] = 'length';
}
if($_POST['password']===''){
	$error['password'] = 'blank';
}

// $errorが空であるかチェックする
if(empty($error)){
	$_SESSION['join'] = $_POST;	//sessionに値を保存する
	header('Location: check.php');	//check.phpに移動する
	exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>会員登録</title>

	<link rel="stylesheet" href="../style.css" />
</head>
<body>
<div id="wrap">
<div id="head">
<h1>会員登録</h1>
</div>

<div id="content">
<p>次のフォームに必要事項をご記入ください。</p>
<form action="" method="post" enctype="multipart/form-data">
	<dl>
		<dt>ニックネーム<span class="required">必須</span></dt>
		<dd>
			<!-- 入力された内容を保持する -->
        	<input type="text" name="name" size="35" maxlength="255" value="<?php print(htmlspecialchars($_POST['name'],ENT_QUOTES)); ?>" />
			<!-- 名前が入力されているか確認する(エラー表示) -->
			<?php if($error['name'] === 'blank'): ?>
				<p class="error">＊ニックネームを入力してください</p>
			<?php endif; ?>
		</dd>
		<dt>メールアドレス<span class="required">必須</span></dt>
		<dd>
			<!-- 入力された内容を保持する -->
			<input type="text" name="email" size="35" maxlength="255" value="<?php print(htmlspecialchars($_POST['email'],ENT_QUOTES)); ?>" />
			<!-- メールアドレスが入力されているか確認する(エラー表示) -->
			<?php if($error['email'] === 'blank'): ?>
        		<p class="error">＊メールアドレスを入力してください</p>
			<?php endif; ?>
		<dt>パスワード<span class="required">必須</span></dt>
		<dd>
			<!-- 入力された内容を保持する -->
        	<input type="password" name="password" size="10" maxlength="20" value="<?php print(htmlspecialchars($_POST['password'],ENT_QUOTES)); ?>" />
			<!-- パスワードの文字数を確認する(エラー表示) -->
			<?php if($error['password'] === 'length'): ?>
        		<p class="error">＊パスワードは4文字以上で入力してください</p>
			<?php endif; ?>
			<!-- パスワードが入力されているか確認する(エラー表示) -->
			<?php if($error['password'] === 'blank'): ?>
        		<p class="error">＊パスワードを入力してください</p>
			<?php endif; ?>
        </dd>
		<dt>写真など</dt>
		<dd>
        	<input type="file" name="image" size="35" value="test"  />
        </dd>
	</dl>
	<div><input type="submit" value="入力内容を確認する" /></div>
</form>
</div>
</body>
</html>
