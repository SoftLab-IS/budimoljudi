<div class="col-sm-12">
    <div class="form-section-heading">
        <h3>Lične informacije</h3>
        <p>Vaši lični podaci pomoću kojih ćemo Vas kontaktirati kada nekome zatreba pomoć. Nakon snimanja ponude pomoći
            moći ćete ponovo pristupiti svom volonterskom profilu na našem sajtu, pomoću email adrese i lozinke koju ste unijeli.</p>
    </div>
</div>


<div class="col-md-3">
    <?php echo $form->labelEx($userModel,'name'); ?>
    <?php echo $form->textField($userModel,'name',array('maxlength'=>255, 'class'=>'form-control')); ?>
    <?php echo $form->error($userModel,'name', array('class'=>'alert alert-danger')); ?>
</div>
<div class="col-md-3">
    <?php echo $form->labelEx($userModel,'email'); ?>
    <?php echo $form->emailField($userModel,'email',array('maxlength'=>255, 'class'=>'form-control')); ?>
    <?php echo $form->error($userModel,'email', array('class'=>'alert alert-danger')); ?>
</div>
<div class="col-md-3">
    <?php echo $form->labelEx($userModel,'password'); ?>
    <?php echo $form->passwordField($userModel,'password',array('maxlength'=>255, 'class'=>'form-control')); ?>
    <?php echo $form->error($userModel,'password', array('class'=>'alert alert-danger')); ?>
</div>
<div class="col-md-3">
    <?php echo $form->labelEx($userModel,'passwordRepeat'); ?>
    <?php echo $form->passwordField($userModel,'passwordRepeat',array('maxlength'=>255, 'class'=>'form-control')); ?>
    <?php echo $form->error($userModel,'passwordRepeat', array('class'=>'alert alert-danger')); ?>
</div>
