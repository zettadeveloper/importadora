<?php
	
require 'src/Mandrill.php';

$quote_data = $wpdb->get_row("SELECT q.id_quote,q.date_quote,q.subtotal_quote,q.total_quote,u.display_name,u.ID,u.user_email,(SELECT COUNT(*) FROM user_products WHERE id_quote = q.id_quote) AS stock FROM quotes AS q INNER JOIN wp_users AS u ON (u.ID = q.id_user) WHERE q.id_quote=".$_POST['id_quote'],OBJECT);

$products_quote = $wpdb->get_results("SELECT up.stock,p.name,p.referencia,p.precio FROM user_products AS up INNER JOIN products AS p ON (up.id_product = p.id_product) WHERE id_quote = ".$quote_data->id_quote,OBJECT_K);

foreach ($products_quote as $key => $product) {
	$products_quote[$key]->total = $product->stock * $product->precio;
}

$mandrill = new Mandrill("Md2FKh_ohIv5WkqCOB-jBQ");
$message = array(
    'subject' => 'Cotizacion #'.$quote_data->id_quote,
    'from_email' => 'sebastian@igniweb.com',
    'html' => '<p>this is a test message with Mandrill\'s PHP wrapper!.</p>',
    'to' => array(array('email' => $quote_data->user_email, 'name' => 'Recipient 1')),
    'merge' => true,
    'merge_language' => 'handlebars',
    'global_merge_vars' => array(
            array(
                'name' => 'fname',
                'content' => $quote_data->display_name
            )
        ),
    'merge_vars' => array(array(
        'rcpt' => $quote_data->user_email,
        'vars' =>
        array(
            array(
                'name' => 'firstname',
                'content' => $quote_data->display_name),
            array(
                'name' => 'lastname',
                'content' => 'Duque'),
            array(
				'name' => 'products',
				'content' => $products_quote
				)
    ))));

$template_name = 'quotes';

$template_content = array(
    array(
        'name' => 'firstname',
        'content' => 'Recipient name'),
    array(
        'name' => 'lastname',
        'content' => 'Last name')

);

$response = $mandrill->messages->sendTemplate($template_name, $template_content, $message);

echo json_encode($response);

?>