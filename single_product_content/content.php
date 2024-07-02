<div class="product_content <?php echo $product->get_stock_status() === 'outofstock' ? 'outofstock' :  ''?> <?php echo is_page('wishlist') ? 'bg-white' : ''?>">
    <div class="wishlist">
        <?php if(is_page('wishlist')):?>
            <?php if ($show_remove_product) : ?>
                <div class="product-remove">
                    <span class="nobr d-flex justify-content-end">
                        <a href="<?php echo esc_url($item->get_remove_url()); ?>"
                            class="remove remove_from_wishlist"
                            title="<?php echo esc_html(apply_filters('yith_wcwl_remove_product_wishlist_message_title', __('Remove this product', 'yith-woocommerce-wishlist'))); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                                <path d="M17.5 2.1875C8.96875 2.1875 2.1875 8.96875 2.1875 17.5C2.1875 26.0312 8.96875 32.8125 17.5 32.8125C26.0312 32.8125 32.8125 26.0312 32.8125 17.5C32.8125 8.96875 26.0312 2.1875 17.5 2.1875ZM23.4062 25.1562L17.5 19.25L11.5938 25.1562L9.84375 23.4062L15.75 17.5L9.84375 11.5938L11.5938 9.84375L17.5 15.75L23.4062 9.84375L25.1562 11.5938L19.25 17.5L25.1562 23.4062L23.4062 25.1562Z" fill="#FF0000"/>
                            </svg>
                        </a>
                    </span>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]') ?>
        <?php endif; ?>
    </div>
    <div class="product_image">
        <?php if($product->get_stock_status()=== "outofstock"):?>
            <span class="out_of_stock">Out of stock</span>
        <?php else:?>
        <?php endif; ?>
        <img loading="lazy" src="<?php echo $img; ?>" alt="<?php echo $title?>">
    </div>
    <div class="content">
        <p class="title"><?php echo $title?></p>
        <p class="price"><?php echo $price?></p>
        <div class="group_button d-none d-md-flex">
            <button class="view_product">
                <a href="<?php echo $url?>" target="_blank" rel="noopener noreferrer">View</a>
            </button>
            <button class="add_to_cart">
                <?php echo $add_to_cart; ?>
            </button>
        </div>
        <div class="group_button d-flex d-md-none">
            <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]')?>
            <a href="<?php echo $url?>" target="_blank" rel="noopener noreferrer">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <g clip-path="url(#clip0_3697_8354)">
                        <path d="M19.8507 9.60918C19.6722 9.41004 15.3782 4.72656 10 4.72656C4.62182 4.72656 0.32791 9.41004 0.149355 9.60918C-0.0497852 9.83176 -0.0497852 10.1682 0.149355 10.3908C0.32791 10.59 4.62189 15.2734 10 15.2734C15.3781 15.2734 19.6721 10.59 19.8507 10.3908C20.0498 10.1682 20.0498 9.83176 19.8507 9.60918ZM10 14.1016C7.73865 14.1016 5.89846 12.2614 5.89846 10C5.89846 7.73863 7.73865 5.89844 10 5.89844C12.2614 5.89844 14.1016 7.73863 14.1016 10C14.1016 12.2614 12.2614 14.1016 10 14.1016Z" fill="white"/>
                        <path d="M10.5859 8.82812C10.5859 8.23867 10.8786 7.72012 11.3237 7.40117C10.9243 7.19668 10.4787 7.07031 10 7.07031C8.38465 7.07031 7.07031 8.38465 7.07031 10C7.07031 11.6154 8.38465 12.9297 10 12.9297C11.4462 12.9297 12.6433 11.8737 12.8798 10.4938C11.6998 10.8737 10.5859 9.98133 10.5859 8.82812Z" fill="white"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_3697_8354">
                        <rect width="20" height="20" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </a>
            <?php echo $add_to_cart; ?> 
        </div>
    </div>
</div>