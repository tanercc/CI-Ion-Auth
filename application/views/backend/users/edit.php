<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

						<div class="row">
							<div class="col-12">
								<p><?php echo lang('edit_user_subheading'); ?></p>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<?php echo form_open(current_url()); ?>
									<div class="form-group row">
										<div class="col-12 col-md-6">
											<?php
												echo form_label(lang('edit_user_fname_label'), 'first_name');
												echo form_input($first_name);
											?>
										</div>
										<div class="col-12 col-md-6">
											<?php
												echo form_label(lang('edit_user_lname_label'), 'last_name');
												echo form_input($last_name);
											?>
										</div>
									</div>
									<div class="form-group">
										<?php
											echo form_label(lang('edit_user_company_label'), 'company');
											echo form_input($company);
										?>
									</div>
									<div class="form-group">
										<?php
											echo form_label(lang('edit_user_phone_label'), 'phone');
											echo form_input($phone);
										?>
									</div>
									<div class="form-group row">
										<div class="col-12 col-md-6">
											<?php
												echo form_label(lang('edit_user_password_label'), 'password');
												echo form_input($password);
											?>
										</div>
										<div class="col-12 col-md-6">
											<?php
												echo form_label(lang('edit_user_password_confirm_label'), 'password_confirm');
												echo form_input($password_confirm);
											?>
										</div>
									</div>

<?php if ($this->ion_auth->is_admin()): ?>
									<div class="form-group">
										<p><?php echo lang('edit_user_groups_heading'); ?></p>
<?php foreach ($groups as $group): ?>
										<div class="form-check form-check-inline">
											<label class="custom-control custom-checkbox">
<?php
	$checked = NULL;
	$item = NULL;

	foreach ($currentGroups as $grp)
	{
		if ($group['id'] == $grp->id)
		{
			$checked = ' checked';
			break;
		}
	}
?>
												<input type="checkbox" name="groups[]" value="<?php echo $group['id']; ?>" class="custom-control-input"<?php echo $checked; ?>>
												<span class="custom-control-indicator"></span>
												<span class="custom-control-description"><?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?></span>
											</label>
										</div>
<?php endforeach; ?>
									</div>
<?php endif; ?>
									<div class="form-group">
										<?php
											echo form_hidden('id', $user_id);
											echo form_hidden($csrf);
											echo form_submit('submit', lang('edit_user_submit_btn'), 'class="btn btn-primary"');
											echo anchor('backend/users', 'cancel', 'class="btn btn-primary"');
										?>
									</div>
								<?php echo form_close(); ?>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<?php echo $message;?>
							</div>
						</div>
