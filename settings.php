<?php
/*
Plugin Name: Simple contact form.
Description: Ce plugin va devoir donner la main à l'administrateur de personnaliser le formulaire de contact à partir d'une version initiale déjà développée.
Version: 1.0.1
Author: FAISAL & SLIMANI
Author URI: https://github.com/faisalbazid
*/
/**
 * create settings menu
 */
function myplugin_settings_menu(){
    add_menu_page(
      __( 'My Plugin Settings', 'simple_contact_form' ),
      __( 'My Plugin', 'simple_contact_form' ),
      'manage_options',
      'myplugin-settings-page',
      'myplugin_settings_template_callback',
      '',
      2,
    );
  }
  add_action('admin_menu','myplugin_settings_menu'); 
  /**
 * Settings Template Page
 */
function myplugin_settings_template_callback() {
  ?>
  <div class="card bg-white">
    
      <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

      <form action="options.php" method="post">
          <?php 
              // security field
              settings_fields( 'myplugin-settings-page' );

              // output settings section here
              do_settings_sections('myplugin-settings-page');

              // save settings button
              submit_button( 'Valider' );
          ?>
      </form>
  </div>

  <?php 
}

/**
 * Settings Template
 */
function myplugin_settings_init() {

  // Setup settings section
  add_settings_section(
      'myplugin_settings_section',
      '',
      '',
      'myplugin-settings-page'
  );




  // Register radio field
  register_setting(
    'myplugin-settings-page',
    'Formulaire_Nom',
    array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => ''
    )
);

// Add radio fields
add_settings_field(
    'Formulaire_Nom',
    __( 'Nom :', 'my-plugin' ),
    'myplugin_settings_radio_field_callback',
    'myplugin-settings-page',
    'myplugin_settings_section'
);







// Register radio field 2
register_setting(
  'myplugin-settings-page',
  'Formulaire_Prenom',
  array(
      'type' => 'string',
      'sanitize_callback' => 'sanitize_text_field',
      'default' => '',
  )
);

// Add radio fields 2
add_settings_field(
  'Formulaire_Prenom',
  __( 'Prenom :', 'my-plugin' ),
  'myplugin_settings_radio_field_callback2',
  'myplugin-settings-page',
  'myplugin_settings_section',
);


// Register radio field 3
register_setting(
  'myplugin-settings-page',
  'Formulaire_Phone',
  array(
      'type' => 'string',
      'sanitize_callback' => 'sanitize_text_field',
      'default' => '',
  )
);

// Add radio fields 3
add_settings_field(
  'Formulaire_Phone',
  __( 'Phone :', 'my-plugin' ),
  'myplugin_settings_radio_field_callback3',
  'myplugin-settings-page',
  'myplugin_settings_section',
);


// Register radio field 4
register_setting(
  'myplugin-settings-page',
  'Formulaire_Adress',
  array(
      'type' => 'string',
      'sanitize_callback' => 'sanitize_text_field',
      'default' => ''
  )
);

// Add radio fields 4
add_settings_field(
  'Formulaire_Adress',
  __( 'Adress :', 'my-plugin' ),
  'myplugin_settings_radio_field_callback4',
  'myplugin-settings-page',
  'myplugin_settings_section'
);


// Register radio field 5
register_setting(
  'myplugin-settings-page',
  'Formulaire_Email',
  array(
      'type' => 'string',
      'sanitize_callback' => 'sanitize_text_field',
      'default' => ''
  )
);

// Add radio fields5
add_settings_field(
  'Formulaire_Email',
  __( 'Email :', 'my-plugin' ),
  'myplugin_settings_radio_field_callback5',
  'myplugin-settings-page',
  'myplugin_settings_section'
);
}
add_action( 'admin_init', 'myplugin_settings_init' );

/**
 * radio field tempalte
 */
function myplugin_settings_radio_field_callback() {
  
  $myplugin_radio_field = get_option('Formulaire_Nom');
  
 
  
  ?> 
  <!DOCTYPE html>
 <html lang="en"> 
 <head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
</body> 
</html>
  <div class="mt-1">
  <label for="scf-nom-A" class="text-primary">
  <input type="radio" class="form-control" value="true" name="Formulaire_Nom" <?php checked('true', $myplugin_radio_field ); ?>/> Activer
  </label>

  <label for="scf-nom-D" class="text-danger">
  <input type="radio" class="form-control" value="false" name="Formulaire_Nom" <?php checked('false', $myplugin_radio_field ); ?>/> Desactiver
  </label>
</div>
  <?php
  

}



function myplugin_settings_radio_field_callback2() {
  
  $myplugin_radio_field2 = get_option('Formulaire_Prenom');
 
  
  ?>
  <div class="mt-1">
  <label for="scf-prenom-A" class="text-primary">
  <input type="radio" class="form-control" value="true" name="Formulaire_Prenom" <?php checked('true', $myplugin_radio_field2 ); ?>/> Activer
  </label>
  
  <label for="scf-prenom-D" class="text-danger">
  <input type="radio" class="form-control" value="false" name="Formulaire_Prenom" <?php checked('false', $myplugin_radio_field2 ); ?>/> Desactiver
  </label>
</div>

      
 
  <?php
}

  
function myplugin_settings_radio_field_callback3() {
  
  $myplugin_radio_field3 = get_option('Formulaire_Phone');
 
  
  ?>
  <div class="mt-1">
   <label for="scf-phone-A" class="text-primary">
  <input type="radio"  value="true" name="Formulaire_Phone" <?php checked('true', $myplugin_radio_field3 ); ?>/> Activer
  </label>

  <label for="scf-phone-D" class="text-danger">
  <input type="radio"  value="false" name="Formulaire_Phone" <?php checked('false', $myplugin_radio_field3 ); ?>/> Desactiver
  </label>
</div>

      
 
  <?php
}


function myplugin_settings_radio_field_callback4() {

  $myplugin_radio_field4 = get_option('Formulaire_Adress');
  ?>
  <div class="mt-1">
  <label for="scf-adress-A" class="text-primary">
 <input type="radio" class="form-control" value="true" name="Formulaire_Adress" <?php checked('true', $myplugin_radio_field4 ); ?>/> Activer
 </label>
 
 <label for="scf-adress-D" class="text-danger">
 <input type="radio" class="form-control" value="false" name="Formulaire_Adress" <?php checked('false', $myplugin_radio_field4); ?>/> Desactiver
 </label>
</div>
 <?php
}


function myplugin_settings_radio_field_callback5() {

  $myplugin_radio_field5 = get_option('Formulaire_Email');
  ?>
 <div class="mt-2">
  
 <label for="scf-email-A" class="text-primary">
   <input type="radio" class="form-control" value="true" name="Formulaire_Email" <?php checked('true', $myplugin_radio_field5 ); ?>/>Activer
   </label>

   <label for="scf-email-D" class="text-danger">
   <input type="radio" class="form-control" value="false" name="Formulaire_Email" <?php checked('false', $myplugin_radio_field5 ); ?>/>Desactiver
 </label>
</div>
 <?php
}

add_shortcode('simple_contact_form', 'myContactFormRender');
function myContactFormRender() {
    ob_start();
    myContactForm();
    return ob_get_clean();
  }
function myContactForm() {
    $myplugin_radio_field = get_option('Formulaire_Nom');
$form = '<form method="POST" class="frm">';

 if (get_option('Formulaire_Nom') == true){
  $form .= '<label for="Formulaire_Nom">Nom:</label>';
  $form .= '<input type="text" name="Formulaire_Nom" class="form-control" required  >';
  $form .= '</br>';
 } else{
  $form .= '<input type="hidden" name="Formulaire_Nom" >';
 };
 

 if (get_option('Formulaire_Prenom')==true){
  $form .= '<label for="Formulaire_Prenom">Prenom:</label>';
  $form .= '<input type="text" name="Formulaire_Prenom"class="form-control" required >';
  $form .= '</br>';
 } else{
  $form .= '<input type="hidden" name="Formulaire_Prenom" >';
 };
 

 if (get_option('Formulaire_Phone')==true){
  $form .= '<label for="Formulaire_Phone">Phone:</label>';
  $form .= '<input type="tel"  name="Formulaire_Phone" required class="form-control">';
  $form .= '</br>';
 } else{
  $form .= '<input type="hidden" name="Formulaire_Phone" >';
 };


 if (get_option('Formulaire_Adress')==true){
  $form .= '<label for="Formulaire_Adress">Adress:</label>';
  $form .= '<input type="text" name="Formulaire_Adress" class="form-control" required >';
  $form .= '</br>';
 } else{
  $form .= '<input type="hidden" name="Formulaire_Prenom" >';
 };
 
 
 if (get_option('Formulaire_Email')==true){
  $form .= '<label for="Formulaire_Email">Email:</label>';
  $form .= '<input type="email" name="Formulaire_Email" class="form-control" required >';
  $form .= '</br>';
 } else{
  $form .= '<input type="hidden" name="Formulaire_Email" >';
 };

 $form .= '<button type="submit" name="Submit" class="btn" >Send</button>';

 if (isset($_POST['Submit']) ){
   
  echo '<script>alert("Your message has been sent successfully.");</script>';
}
else {
  echo '';
}


$form .= '</form>';
 echo $form;
 ?>
 <style>
      .form-control {
        width: 50%;
       
        
      }
      .frm{
      margin-left:400px;
   
      
      }
      
      .btn {
        border-radius: 4px;
        background-color: red;
        border: none;
        font-size: 22px;
         padding: 20px;
         color:white;
      }
    </style>
 <?php
}
