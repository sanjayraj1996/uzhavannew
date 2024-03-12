<!DOCTYPE html>
<html>
    <?php $this->load->view('head'); ?>
<body>
    <?php $this->load->view('header'); ?>
   
    <fieldset class="main_content">
        
        <section id="consumer_guide" class="row1">
            <section class="row1_list">
                <section class="row1_title">
                    <h2 >Major selling item</h2>
                </section class="row1_attr">
                    <a href="" class="vegetables">Vegetables</a>
                    <a href="" class="fruits">Fruits</a>
                    <a href="" class="nuts">Nuts</a>
                    <a href="" class="milky_products">Milky products</a>
                    <a href="" class="grains">Grains</a>
                    <a href="" class="protein">Proteins</a>
                    <a href="" class="green_leaves">Green leaves</a>
            </section>
            <section class="row1_image">
                <img src="<?php echo base_url('assets/images/vegetable.jpeg'); ?>" alt="vegetable">
                <img src="<?php echo base_url('assets/images/fruits.jpeg'); ?>" alt="fruits">
                <img src="<?php echo base_url('assets/images/grains.jpeg'); ?>" alt="grains">
                <img src="<?php echo base_url('assets/images/nuts.jpeg'); ?>" alt="nuts">
            </section>
        </section>
        
        <section class="row2"> 
            <section class="row2_list">
                <section class="row2_title">
                    <h2>Buying process for consumers</h2>
                </section>
                <section>
                    <a href="" class="choose_the_goods">Choose your goods</a>
                    <a href="" class="add_to_cart">Add to cart</a>
                    <a href="" class="check_your_list">Check your list</a>
                    <a href="" class="payment_methods">Payment methods</a>
                    <a href="" class="confirm the order">Confirm the order</a>
                </section>
            </section>
                <section class="row2_image">
                    <img src="<?php echo base_url('assets/images/process_buying.jpeg'); ?>" alt="process_buying">
                    
                </section>
            </section>
                <section class="row3">
                    <section class="row3_list">
                        <section class="row3_title">
                            <h2>Best selling price</h2>
                        </section>
                            <a href="" class="vegetables">Vegetables</a>
                            <a href="" class="fruits">Fruits</a>
                            <a href="" class="nuts">Nuts</a>
                            <a href="" class="milky_products">Milky products</a>
                            <a href="" class="grains">Grains</a>
                            
                        </section>
                        <section class="row3_image">
                            <img src="<?php echo base_url('assets/images/fats_oil.jpeg'); ?>" alt="fats_oil">
                            <img src="<?php echo base_url('assets/images/nuts.jpeg'); ?>" alt="nuts">
                            <img src="<?php echo base_url('assets/images/fruits.jpeg'); ?>" alt="fruits">
                        </section>        
                    </section>
        
        <section class="row4">
            <section class="row4_list">
                <section class="row4_title">
                    <h2>Season goods</h2>
                    </section>
                    <section class="scroll_pane">
                    <a href="" class="vegetables">Vegetables</a>
                    <a href="" class="fruits">Fruits</a>
                    <a href="" class="nuts">Nuts</a>
                    <a href="" class="milky_products">Milky products</a>
                    <a href="" class="grains">Grains</a>
                </section>
            </section>
            <section class="row4_image">
                <img src="<?php echo base_url('assets/images/fruits.jpeg'); ?>" alt="fruits">
                <img src="<?php echo base_url('assets/images/grains.jpeg'); ?>" alt="grains">
                <img src="<?php echo base_url('assets/images/vegetable.jpeg'); ?>" alt="vegetable">
            </section>
        </section>
    </fieldset>
    <?php $this->load->view('footer'); ?>
</body>
</html>