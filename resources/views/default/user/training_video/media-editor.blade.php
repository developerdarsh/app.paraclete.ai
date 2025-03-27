@extends('layouts.app')

@section('css')
<style>
    .editing-tools-layout {
        display: flex;
        width: 100%;
        height: 100%;
        padding-top: 30px;
        position: relative;
    }

    .editing-tools-btn-group {
        display: flex;
        flex-direction: row;
        width: 28%;
        margin: 0;
        padding: 10px 0px;
        border: 0px solid #fff;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        border-radius: 0;
        position: absolute;
        left: 0px;
        background: #fff;
        height: 100%;
        align-items: center;
        justify-content: flex-start;
        overflow-y: auto;
        flex-wrap: wrap;
    }

    .editing-tools-btn-group button {
        border: 0px solid transparent;
        margin: 5px 0px;
        padding: 5px 0;
        background: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        color: #000;
        transition: 0.3s ease-in;
        position: relative;
        width: 50%;
    }

    .editing-tools-btn-group button:hover {
        background: #f5f9fc;
        transition: 0.3s ease-in;
    }

    .editing-tools-btn-group button .spectrum-Button-label {
        font-size: 12px;
        color: #007bff;
        text-align: center;
        width: 120px;
    }

    .editing-tools-btn-group button:hover .spectrum-Button-label {
        color: #000;
        transition: 0.3s ease-in;
    }

    .editing-tools-btn-group button .editing-icon {
        width: 24px;
        Height: 24px;
        margin-bottom: 5px;
    }

    .editing-tools-btn-group button .editing-icon img {
        width: 100%;
        Height: 100%;
        filter: grayScale(0) brightness(1);
        transition: 0.3s ease-in;
    }

    .editing-tools-btn-group button:hover .editing-icon img {
        filter: grayScale(1) brightness(0);
        transition: 0.3s ease-in;
    }

    .editing-tools-btn-group button:hover {
        color: #007BFF;
        transition: 0.3s ease-in;
    }

    .upload-image-area {
        background: #fff;
        width: 70%;
        Height: 500px;
        margin: 0px 0% 0px auto;
        position: relative;
        border: 2px dashed #000;
        border-radius: 30px;
    }

    .upload-image-area .upload-img {
        appearance: none;
        position: absolute;
        width: 250px;
        Height: 250px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: url("../../../../public/img/editor/gallery-blue.png")no-repeat;
        background-size: 85%;
        background-position: bottom center;
        border: none;
        text-align: center;
        margin-top: 50px;
    }

    .upload-image-area .upload-img:hover {
        cursor: pointer;
    }

    .upload-image-area .upload-img::file-selector-button {
        background: transparent;
        font-size: 0;
        appearance: none;
        border: none;
        width: 100px;
        height: 50px;
    }

    .reset-button {
        padding: 10px;
        width: auto;
        display: flex;
        border: none;
        background: #fff;
        align-items: center;
        position: absolute;
        bottom: 30px;
        right: 30px;
        border: 1px solid #d3d3d3;
        border-radius: 30px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        transition: 0.3s ease-in;
    }

    .reset-button img {
        width: 24px;
        height: 24px;
        margin-right: 15px;
    }

    .reset-button:hover {
        background: #d3d3d3;
        transition: 0.3s ease-in;
    }

    .cc-everywhere-iframe {
        z-index: 999999 !important;
    }

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Semi-transparent background */
        z-index: 9999;
        overflow: auto;
    }

    .modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        border-radius: 10px;
    }

    #customize-modal iframe {
        height: 650px !important
    }

    /* Blur effect for the background */
    .blur-background {
        filter: blur(5px);
        /* Adjust the blur amount as needed */
    }

    @media screen and (max-width: 1024px) {
        .editing-tools-layout {
            display: flex;
            flex-direction: column;
        }

        .editing-tools-btn-group {
            position: relative;
            width: 100%;
            margin-bottom: 25px;
        }

        .upload-image-area {
            width: 100%;
        }
    }

    @media screen and (max-width: 767px) {
        .upload-image-area .upload-img {
            margin-top: 0;
            width: auto;
            background-size: 40%;
            Height: 200px;
        }

        .upload-image-area {
            Height: 360px;
        }
    }

    body.cc-everywhere-root-default-parent {
        height: 100vh;
        width: 100vw;
        position: fixed;
        z-index: 111111;
    }

    .cc-everywhere-root-default-parent {
        z-index: 11111;
    }
</style>
@endsection

@section('content')
<div class="editing-tools-layout">
    <div id="image-buttons" class="editing-tools-btn-group">
        <button id="image-crop" class="spectrum-Button spectrum-Button--fill spectrum-Button--accent spectrum-Button--sizeL">
            <span class="editing-icon">
                <image src="../../../../public/img/editor/crop-blue.png" />
            </span>
            <span class="spectrum-Button-label">Crop Image</span>
        </button>
        <button id="image-resize" class="spectrum-Button spectrum-Button--fill spectrum-Button--accent spectrum-Button--sizeL">
            <span class="editing-icon">
                <image src="../../../../public/img/editor/increase-blue.png" />
            </span>
            <span class="spectrum-Button-label">Resize Image</span>
        </button>
        <button id="convert-to-jpg" class="spectrum-Button spectrum-Button--fill spectrum-Button--accent spectrum-Button--sizeL">
            <span class="editing-icon">
                <image src="../../../../public/img/editor/jpg-formate-blue.png" />
            </span>
            <span class="spectrum-Button-label">Convert to JPG</span>
        </button>
        <button id="convert-to-png" class="spectrum-Button spectrum-Button--fill spectrum-Button--accent spectrum-Button--sizeL">
            <span class="editing-icon">
                <image src="../../../../public/img/editor/png-formate-blue.png" />
            </span>
            <span class="spectrum-Button-label">Convert to PNG</span>
        </button>
        <button id="remove-background" class="spectrum-Button spectrum-Button--fill spectrum-Button--accent spectrum-Button--sizeL">
            <span class="editing-icon">
                <image src="../../../../public/img/editor/background-blue.png" />
            </span>
            <span class="spectrum-Button-label">Remove Background</span>
        </button>
        <button id="custom-template-editor" class="spectrum-Button spectrum-Button--outline spectrum-Button--secondary spectrum-Button--sizeL">
            <span class="editing-icon">
                <image src="../../../../public/img/editor/edit-image-blue.png" />
            </span>
            <span class="spectrum-Button-label">Create Customize template</span>
        </button>
    </div>
    <div class="upload-image-area">
        <input type="file" id="fileInput" accept="image/*" class="upload-img" />
        <button id="reset" class="reset-button">
            <image src="../../../../public/img/editor/reset.png" />Reset Image
        </button>
    </div>
</div>
<div id="customize-modal" class="modal">
    <div class="modal-content">
        <iframe id="customize-iframe" width="100%" height="100%" frameborder="0"></iframe>
    </div>
</div>
@endsection
@section('js')
<!--<script src="{{URL::asset('js/CCEverywhere.js')}}"></script> -->
<!-- <script src="https://sdk.cc-embed.adobe.com/v1/CCEverywhere.js"></script> -->
<script src="https://cc-embed.adobe.com/sdk/v4/CCEverywhere.js"></script>
    <script type=" text/javascript">
    (async () => {
        // const ccEverywhere = await window.CCEverywhere.initialize({
        //    clientId: '556e6a3e9fd94fedb9f28cce2bcb4adb',
        //    appName: 'paraclete',
        //     appVersion: { major: 1, minor: 0 },
        //    platformCategory: 'web'
        // });
        
        
        const ccEverywhere = await window.CCEverywhere.initialize({
            clientId: '556e6a3e9fd94fedb9f28cce2bcb4adb',
            appName: 'paraclete',
        });

/*
        const { editor } = await ccEverywhere.initialize({
            clientId: '556e6a3e9fd94fedb9f28cce2bcb4adb',
            appName: 'paraclete',
        }); 

*/
        // Initialize SDK and save CCEverywhere object as ccEverywhere 
       // ccEverywhere.module.editImage();

        var inputFile = document.getElementById('fileInput');
        var encodedImage;
        var appImage = document.getElementById('image-container');

        inputFile.addEventListener('change', (e) => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                encodedImage = reader.result;
            }
            reader.onerror = (error) => {
                console.log('error', error);
            };
        })

        const exportOptions = [{
                target: 'Editor',
                id: 'edit-in-express',
                buttonType: 'native',
                variant: 'primary',
                optionType: 'button',
                label: 'Customize'
            },
            {
                target: 'Download',
                id: 'download-button',
                variant: 'cta',
                optionType: 'button',
                buttonType: 'native'
            },
            {
                target: 'Host',
                id: 'save-modified-asset',
                label: 'Save image',
                optionType: 'button',
                buttonType: 'custom'
            },
        ];

        const imageCallbacks = {
            onCancel: () => {},
            onPublish: (publishParams) => {
                const localData = {
                    asset: publishParams.asset[0].data
                }
                console.log("Published asset", publishParams)
                if (publishParams.exportButtonId == "save-modified-asset") {
                    appImage.src = localData.asset;
                    appImage.style.visibility = "visible";
                }
            },
            onError: (err) => {
                console.error('Error received is', err.toString())
            }
        }

        const openQAwithAsset = (qa_id) => {
        setStyle()
            console.log("qa_id", qa_id);
            ccEverywhere.quickAction.convertToJPEG();
        }

        function openCustomizeIframe() {
            setStyle();
            if (encodedImage) {
                openQAwithAsset('custom-template-editor');
            } else {
                ccEverywhere.editor.create();
            }
        }

        const modal = document.getElementById('customize-modal');
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
                document.body.classList.remove('blur-background');
            }
        });

        function imageQuickAction(qa_id) {
            if (encodedImage) {
                setStyle();
                return openQAwithAsset(qa_id);
            } else {
                console.log("qa_id ==", qa_id);
                setStyle();
                if(qa_id == 'qa_id'){
                    ccEverywhere.quickAction.convertToJPEG();
                } else if(qa_id == 'image-crop'){
                    ccEverywhere.quickAction.cropImage();
                }else if(qa_id == 'image-resize'){
                    ccEverywhere.quickAction.resizeImage();
                }else if(qa_id == 'convert-to-jpg'){
                    ccEverywhere.quickAction.convertToJPEG();
                }else if(qa_id == 'convert-to-png'){
                    ccEverywhere.quickAction.convertToPNG();
                }else if(qa_id == 'remove-background'){
                    ccEverywhere.quickAction.removeBackground();
                }else if(qa_id == 'custom-template-editor'){
                    ccEverywhere.editor.createWithAsset();
                }


                
                
            }
        };

        // Button event listeners 

        let imageButtons = document.querySelectorAll('#image-buttons button');
        imageButtons.forEach((button) => {
            button.addEventListener('click', () => {
                if (button.id === 'custom-template-editor') {
                    openCustomizeIframe();
                } else {
                    imageQuickAction(button.id);
                }
            });
        })

        // document.getElementById('clear').addEventListener('click', () => {
        //     appImage.src=null;
        //     appImage.style.visibility="hidden";
        // })

        // document.getElementById('reset').addEventListener('click', () => {
        //     inputFile.value = '';
        //     encodedImage = null;
        //     appImage.src = null;
        // })
    })();

    function setStyle() {
        setTimeout(
            function() {
                let url = window.location.href;
                // Find all elements in the document
                let allElements = document.querySelectorAll('*');
                // Convert NodeList to Array and filter elements with tag name starting with "cc-everywhere-container-"
                let ccEverywhereContainerElement = Array.from(allElements).find(element => element.tagName.startsWith('CC-EVERYWHERE-CONTAINER-'));

                console.log('url', ccEverywhereContainerElement);
                if (url && ccEverywhereContainerElement !== null) {
                    console.log('set set style');
                    if (ccEverywhereContainerElement) {
                        if (ccEverywhereContainerElement.shadowRoot) {
                            console.log('Edit set style');
                            let ccEverywhereRoot = ccEverywhereContainerElement.shadowRoot.querySelector(".cc-everywhere-root");

                            if (ccEverywhereRoot) {
                                // Add style tag to shadow DOM
                                console.log('Add set style');
                                const newStyle = document.createElement('style');
                                newStyle.textContent = `
                                        .cc-everywhere-root-default-parent {
                                            z-index: 11111;
                                        }



                                    `;
                                ccEverywhereContainerElement.shadowRoot.appendChild(newStyle);
                            } else {
                                console.error(".cc-everywhere-root not found within cc-everywhere-container shadow DOM.");
                            }
                        } else {
                            console.error("Shadow DOM not found in cc-everywhere-container.");
                        }
                    } else {
                        console.error("cc-everywhere-container element not found.");
                    }
                }else{
                    console.log("else");
                }
            }, 1000);
    }
</script>
@endsection