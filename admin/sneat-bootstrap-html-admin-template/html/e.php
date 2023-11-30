<?php
// List submitted Excel files for review
$uploadDir = 'files/';
$b=$uploadDir;
$uploadedFiles = glob($b . '*.xlsx'); 

    echo '<form method="post" action="multiproduct.php">
    <table border="1px" padding="20px" border-spacing="20px">
    <thead>
    <th>Name Of company</th>
    <th>File Name</th>
    <th>&nbsp; Approved &nbsp;</th>
    <th>&nbsp; Rejection &nbsp;</th>
    </thead>
    <tbody>
';
    
if (!empty($uploadedFiles)) {
    echo '<h2>Submitted Excel Files</h2>';
    foreach ($uploadedFiles as $file) {
    echo '
    <td>';
     
        $fileName = basename($file);
        $parts=pathinfo($fileName);
        $filenameWithoutExtension = $parts['filename'];
        echo $filenameWithoutExtension;
        echo "</td>"
?>
        <td><a href="<?php echo $file ?>" target="_blank"><?php  echo $fileName;?></a></td>
        <input type="hidden" name="fil" value="<?php echo $file ?>">
<?php         #echo '<li><a href="' . $file . '" target="_blank">' . $fileName . '</a></li>';
    
    echo '
    <td>&nbsp;&nbsp;<button name="mul">Approve</button>&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;<button>Reject</button>&nbsp;&nbsp;</td>
    </form>
</tbody>';
}
echo "    
    </table>";
} 
else {
    echo '<p>No submitted files available for review.</p>'.error_reporting(E_ALL).ini_set('display_errors', 1);

}

// <!-- /hit/vendor/sneat-bootstrap-html-admin-template/html/'. $pdfPath -->


// public function get_shipping_label_template( $column = 1, $row = 1, $font_size = 20 ) {
//     $content = '';
//     $content .= $this->get_css();
//     $orders  = $this->orders;
//     //  get single shipping lable.
//     if ( 1 === count( $orders ) ) {
//       $this->order = wc_get_order( $orders[0] );
//             // TODO Condition for Site Lang or Order Lang.
//             $language_code = $this->order->get_meta( 'woo_invoice_order_lang');
//             $document_language = '' != get_option( 'wpifw_pdf_document_language' ) ? get_option( 'wpifw_pdf_document_language' ) : 'wpifw_pdf_site_language';
//             global $locale;
//             update_option('wpifw_site_default_language', $locale);
//             // Switch Language Action Hook
//             if ( 'wpifw_pdf_order_language' === get_option('wpifw_pdf_document_language') ) {
//                 do_action('woo_invoice_switch_language',$language_code);
//             }elseif ( 'wpifw_pdf_site_language' !== get_option('wpifw_pdf_document_language') ) {
//                 do_action('woo_invoice_switch_language',$document_language);
//             }
//       $rtl = $this->set_rtl( $this->order );
//       $content .= "<div dir='$rtl'>";
//       $row     = 1;
//       $column  = 1;
//       $index   = 0;
//       $content .= "<div dir='$rtl'>";
//       $content .= "<table style='font-size:$font_size'>";
//       for ( $r = 1; $r <= $row; $r ++ ) {
//         // Apply custom shipping label.
//         if ( has_filter('woo_invoice_custom_shipping_label') ) {
//           $single_shipping_label = apply_filters('woo_invoice_custom_shipping_label', $this->order, $this->helper);
//           if ( is_array($single_shipping_label) && ! empty($single_shipping_label[0]) ) {
//             $content .= $single_shipping_label[0];
//             $padding = ( ! empty($single_shipping_label[1])) ? $single_shipping_label[1] : '';
//             $height_and_font_size = ( ! empty($single_shipping_label[2])) ? $single_shipping_label[2] : '';
//           }
//         }else {
//           $padding = '';
//           $height_and_font_size = '';
//         }

//         $content .= "<tr>";
//         for ( $c = 1; $c <= $column; $c ++ ) {
//           if ( $index < count( $orders ) ) {
//             // Get shipping address with or without padding based on row no.
//             $content .= $this->get_shipping_label_content( $orders, $index, $column, $r = '', $padding,  $height_and_font_size);
//           }
//           $index ++;
//         }
//         $content .= "</tr>";
//         break;
//       }
//       $content .= "</table>";
//       $content .= "</div>";

//             // Revert Language Action Hook
//             if ( 'wpifw_pdf_order_language' === get_option('wpifw_pdf_document_language') ) {
//                 do_action('woo_invoice_restore_language');
//             }elseif ( 'wpifw_pdf_site_language' !== get_option('wpifw_pdf_document_language') ) {
//                 do_action('woo_invoice_restore_language');
//             }

//       return $content;

//       // Get bulk shipping lablel.
//     } elseif ( count( $orders ) >= $row ) {
//       $order_chunk = array_chunk( $orders, $row * $column );
//       $total_chunk = count( $order_chunk );
//       $page_break  = 'page-break-after: always;';
//     }


//     $index = 0;
//     for ( $ch = 0; $ch < $total_chunk; $ch ++ ) {
//       $min = $total_chunk - $ch;
//       if ( 1 === $min ) {
//         $content .= "<table style=' font-size:$font_size'>";
//         for ( $r = 1; $r <= $row; $r ++ ) {
//           // Apply custom shipping label.
//           if ( has_filter('woo_invoice_custom_shipping_label') ) {
//             $bulk_shipping_label = apply_filters('woo_invoice_custom_shipping_label', $this->order,  $this->helper);
//             if ( is_array($bulk_shipping_label) && ! empty($bulk_shipping_label[0]) ) {
//               $content .= $bulk_shipping_label[0];
//               $padding = ( ! empty($bulk_shipping_label[1])) ? $bulk_shipping_label[1] : '';
//               $height_and_font_size = ( ! empty($bulk_shipping_label[2])) ? $bulk_shipping_label[2] : '';
//             }
//           }else {
//             $padding = '';
//             $height_and_font_size = '';
//           }

//           $content .= "<tr>";
//           for ( $c = 1; $c <= $column; $c ++ ) {
//             if ( $index < count( $orders ) ) {
//               // Get shipping address with or without padding based on row no.
//               $content .= $this->get_shipping_label_content( $orders, $index, $column, $row , $padding, $height_and_font_size );

//             }
//             $index ++;
//           }
//           $content .= "</tr>";
//         }
//         $content .= "</table>";
//       } else {
//         $content .= "<table style='$page_break font-size:$font_size'>";
//         for ( $r = 1; $r <= $row; $r ++ ) {
//           // Apply custom shipping label.
//           if ( has_filter('woo_invoice_custom_shipping_label') ) {
//             $bulk_shipping_label = apply_filters('woo_invoice_custom_shipping_label', $this->order,  $this->helper);
//             if ( is_array($bulk_shipping_label) && ! empty($bulk_shipping_label[0]) ) {
//               $content .= $bulk_shipping_label[0];
//               $padding = ( ! empty($bulk_shipping_label[1])) ? $bulk_shipping_label[1] : '';
//               $height_and_font_size = ( ! empty($bulk_shipping_label[2])) ? $bulk_shipping_label[2] : '';
//             }
//           }else {
//             $padding = '';
//             $height_and_font_size = '';
//           }
//           $content .= "<tr>";
//           for ( $c = 1; $c <= $column; $c ++ ) {
//             if ( $index < count( $orders ) ) {
//               // Get shipping address with or without padding based on row no.

//               $content .= $this->get_shipping_label_content( $orders, $index, $column, $row, $padding, $height_and_font_size );

//             }
//             $index ++;
//           }
//           $content .= "</tr>";
//         }
//         $content .= "</table>";
//       }
//     }

//     return $content;
//   }

  /**
   * @param $orders
   * @param $index
   * @param $column
   * @param $r
   *$payment_method = $this->order->get_payment_method();
   * @return string
   */




