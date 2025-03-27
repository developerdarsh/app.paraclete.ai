@extends('layouts.app')

@section('css')
   <style>
   iframe {
    border: 0;
    width: 100%;
    height: 100vh;
}
</style>
@endsection

@section('content') 

<iframe id="audio_iframe" 
src="https://widget.synthflow.ai/widget/v2/1731328845426x242808969017300770/1731328845328x509116706030838800" allow="microphone" width="400px" height="600px" pointer-events="none" scrolling="no" style="position: fixed; background: transparent; border: none; z-index: 999">
</iframe>  

   <!-- <iframe src="https://app.flowtrack.co/auth/login" width="1200" height="700"></iframe> -->
   <!-- <iframe src="https://www.paracletebuilder.com/auth/login" width="100%" height="800" allowfullscreen></iframe> -->
   <!-- <iframe src="https://salespype.pypepro.com/login" width="100%" height="800" allowfullscreen></iframe> -->
   
@endsection

@section('js')

@endsection