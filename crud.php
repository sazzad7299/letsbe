<?php 
/* 
Template Name: Crud Application
*/
get_header();?>


    <section>
    <div class="container">
      <div class="col-md-6 ml-md-auto">
      <form action="">
      <div class="form-group">
              <input type="text" placeholder="Text field with Placeholder" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" placeholder="Smaller Text field" class="form-control input-sm">
            </div>
            <div class="form-group has-error">
              <input type="password" placeholder="Password Input with error style" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" placeholder="Disabled Input" disabled class="form-control">
            </div>
            <div class="form-group has-success">
              <textarea placeholder="Textarea  with success style" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label>Text field with label</label>
              <input type="text" class="form-control">
            </div>

        <input type="submit" class="btn btn-color btn-block" value=" Submit" >
      </form>
      </div>
    </div>
    </section>




<?php get_footer(); ?>