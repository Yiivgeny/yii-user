<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'inlineForm',
    'type' => 'inline',
    'htmlOptions' => array('class' => ''),
)); ?>


<?php
$this->layout = '//layouts/login';
$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Login");
$this->breadcrumbs = array(
    UserModule::t("Login"),
);
?>

<h2><?php echo UserModule::t("Login"); ?></h2>

<?php if (Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
    <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>

<div class="input-prepend" title="Username">
    <span class="add-on"><i class="icon-user"></i></span>

    <?php echo $form->textFieldRow($model, 'username', array('class' => 'input-large span10', 'placeholder' => 'Введите имя или почту')); ?>


</div>
<div class="input-prepend" title="Password">
    <span class="add-on"><i class="icon-lock"></i></span>
    <?php echo $form->passwordFieldRow($model, 'password', array('class' => 'input-large span10')); ?>
</div>

<div class="clearfix"></div>


<?php echo $form->checkboxRow($model, 'rememberMe', array('class' => '')); ?>

<div class="button-login">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => 'Log in', 'icon' => 'icon-off')); ?>
</div>
<div class="clearfix"></div>
<?php $this->endWidget(); ?>