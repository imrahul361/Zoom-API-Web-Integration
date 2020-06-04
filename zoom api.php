<!-- header -->
<!-- import #zmmtg-root css -->
<link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.7.7/css/react-select.css" />

<body>
    <!-- import ZoomMtg dependencies -->
    <script src="https://source.zoom.us/1.7.7/lib/vendor/react.min.js"></script>
    <script src="https://source.zoom.us/1.7.7/lib/vendor/react-dom.min.js"></script>
    <script src="https://source.zoom.us/1.7.7/lib/vendor/redux.min.js"></script>
    <script src="https://source.zoom.us/1.7.7/lib/vendor/redux-thunk.min.js"></script>
    <script src="https://source.zoom.us/1.7.7/lib/vendor/jquery.min.js"></script>
    <script src="https://source.zoom.us/1.7.7/lib/vendor/lodash.min.js"></script>


    <!-- import ZoomMtg -->
    <script src="https://source.zoom.us/zoom-meeting-1.7.7.min.js"></script>
    <script type="text/javascript">
        // ZoomMtg.setZoomJSLib('https://dmogdx0jrul3u.cloudfront.net/1.7.6/lib', '/av');
        ZoomMtg.preLoadWasm();
        ZoomMtg.prepareJssdk();
        var meetConfig = {
            apiKey: "API public Key",
            apiSecret: "API private Key",
            meetingNumber: "Meeting ID",
            userName: "Username",
            passWord: "Meeting Password",
            leaveUrl: "<?php echo base_url('Home/index'); ?>",
            role: 0 // 0 for attendent and 1 for host
        };
        var signature = ZoomMtg.generateSignature({
            meetingNumber: meetConfig.meetingNumber,
            apiKey: meetConfig.apiKey,
            apiSecret: meetConfig.apiSecret,
            role: meetConfig.role,
            success: function(res) {
                console.log(res.result);
            }
        });
        ZoomMtg.init({
            leaveUrl: meetConfig.leaveUrl,
            isSupportAV: true,
            success: function() {
                ZoomMtg.join({
                    meetingNumber: meetConfig.meetingNumber,
                    userName: meetConfig.userName,
                    signature: signature,
                    apiKey: meetConfig.apiKey,
                    passWord: meetConfig.passWord,
                    success: function(res) {
                        $('#nav-tool').hide();
                    },
                    error: function(res) {
                        console.log(res);
                    }
                });
            },
            error: function(res) {
                console.log(res);
            }
        });
    </script>
</body>