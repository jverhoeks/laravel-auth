<div class="row">
    <div class="col-md-12 margin-bottom-2 text-center">
        {!! HTML::icon_link(route('social.redirect',['provider' => 'facebook']), 'fa fa-facebook', '', array('class' => 'btn btn-social-icon btn-lg margin-half btn-facebook')) !!}
        {!! HTML::icon_link(route('social.redirect',['provider' => 'google']), 'fa fa-google-plus', '', array('class' => 'btn btn-social-icon btn-lg margin-half btn-google')) !!}
      {!! HTML::icon_link(route('social.redirect',['provider' => 'instagram']), 'fa fa-instagram', '', array('class' => 'btn btn-social-icon btn-lg margin-half btn-instagram')) !!}
    </div>
</div>
