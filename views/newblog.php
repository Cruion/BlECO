<?php include "views/template/header.php";?>
<!--=========================================================================-->
<!-- Start Content Section                                                   -->
<!--=========================================================================-->
<div class="container">
    <?php if ($_SESSION['guest'] == "notGuest" && $numPosts["numPosts"] == 0) {?>
      <!--  <div class="alert alert-dismissable alert-warning">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4 class="smallCap">Warning!</h4>
            <p>You have currently not submitted a blog for this week. You have <?php echo $currentWeek["remaining"];?> remaining.</p>
        </div> -->
<?php }?>
    <h1 class="smallCap"><?php echo $_SESSION['courseCode'];?> <small><?php echo $_SESSION['courseName'];?></small></h1>

    <div class="row">
<?php if ($_SESSION['guest'] == "notGuest") {?>
            <h2>New Blog</h2>

            <form class="form-horizontal" action="/new-blog" method="post">
                <fieldset>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" onkeyup="titleChange()" onchange="titleChange()" onblur="slugify()">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slug" class="col-sm-2 control-label">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="body" class="col-lg-2 control-label">Body</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="6" id="body" name="body" onkeyup="bodyChange()" onchange="bodyChange()"></textarea>
                          <p class="help-block">Can format blog using bbcode style formatting. Accepted formatting: <code data-toggle="tooltip" data-placement="top" title="<strong>[b]</strong> bold text <strong>[/b]</strong>">b</code>, <code data-toggle="tooltip" data-placement="top" title="<strong>[i]</strong> italic text <strong>[/i]</strong>">i</code>, <code data-toggle="tooltip" data-placement="top" title="<strong>[img]</strong> http://imgur.com/gallery/??????? OR img/uqjweige_?????????.png <strong>[/img]</strong>">img</code>, <code data-toggle="tooltip" data-placement="top" title="<strong>[url]</strong> www.google.com <strong>[/url]</strong>">url</code>, <code data-toggle="tooltip" data-placement="top" title="<strong>[code]</strong> &lt; p &gt; Example text &lt; /p &gt; <strong>[/code]</strong>">code</code>.</p>
                        </div>
                      </div>
                    <div class="form-group">
                        <label for="video" class="col-sm-2 control-label">Video</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="video" name="video" onkeyup="videoChange()" onchange="videoChange()" placeholder="HDUaoIqcn2c (YouTube video id) OR 120562699 (Vimeo video id)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="video" class="col-sm-2 control-label">Tags</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tags" name="tags">
                            <p class="help-block">Comma separated list.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <button id="btnSubmit" type="submit" class="btn btn-primary" disabled>Submit</button>
                    </div>
                </fieldset>
            </form>
    </div>
    <div class="row">
        <div class="col-md-9 col-md-offset-3">
            <h3>Preview</h3>

            <div class="panel panel-default">
    <div class="panel-heading clearfix">
        <div class="row">
            <div class="col-lg-2">
                <img src="/<?php echo $userDetails["groupIcon"];?>" class="img-thumbnail" />
            </div>
            <div class="col-lg-10">
        <h3 id="previewTitle">&nbsp;</h3>
        <p class="smallCap"><?php echo $userDetails["givenName"] . " " . $userDetails["familyName"] . " [" . $userDetails["name"] . "]";?> - <?php echo date("D j F Y\, g:i a", strtotime(date("Y-m-d H:i:s")));?></p>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="embed-responsive embed-responsive-16by9" id = "videoDiv" style="display:none">
                <embed
                    class="embed-responsive-item"
                    allowfullscreen="true"
                    src="http://www.youtube.com/v/"
                    type="application/x-shockwave-flash">
                </embed>
            </div>
            <br id="videoBr" style="display:none"/>
       <p id = "previewBody"></p>
    </div>
</div>
        </div>


<?php } else {?>
            <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4 class="smallCap">No permission!</h4>
                <p>You do not have permission to post to the DECO3801/7381 team blogs.</p>
            </div>
<?php }?>
    </div>
</div>
<!--=========================================================================-->
<!-- Stop Content Section                                                    -->
<!--=========================================================================-->

<?php include "views/template/footer.php";?>

<script type="text/javascript">
    var offset = 1;

    $(document).ready(function() {

        $('[data-toggle="tooltip"]').tooltip({html: true});

    });

    function slugify() {
        var title = $("#title").val();
        $.ajax({
            type: "POST",
            url: "<?php echo Util::getHost();?>/new-blog",
            data: { title: title },
            success: function(data) {
                $("#slug").val(data);
            },
            dataType: "text"
        });
    }

    function titleChange() {
        var title = $("#title").val();
        $("#previewTitle").text(title);

        if ($("#title").val().length > 0 && $("#body").val().length > 0) {
            $("#btnSubmit").prop("disabled",false);
        } else {
            $("#btnSubmit").prop("disabled",true);
        }
    }

    function bodyChange() {
        var body = $("#body").val();
        body = htmlEncode(body);
        for (var i =0;i<format_search.length;i++) {
            body = body.replace(format_search[i], format_replace[i]);
        }
        $("#previewBody").html(nl2br(body));

        if ($("#title").val().length > 0 && $("#body").val().length > 0) {
            $("#btnSubmit").prop("disabled",false);
        } else {
            $("#btnSubmit").prop("disabled",true);
        }
    }

    function videoChange() {
        var video = $("#video").val();

        if (video.length > 0 && video.match(/[a-zA-Z]/)) {
            $("#videoDiv").html("<embed class='embed-responsive-item' allowfullscreen='true' src='http://www.youtube.com/v/" + video + "' type='application/x-shockwave-flash'></embed>");
            $("#videoDiv").show();
            $("#videoBr").show();
        } else if (video.length > 0 && !video.match(/[a-zA-Z]/)) {
            $("#videoDiv").html('<iframe src="//player.vimeo.com/video/'+video+'?byline=0&portrait=0" width="400" height="225" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
            $("#videoDiv").show();
            $("#videoBr").show();
        } else {
            $("#videoEmbed").remove();
            $("#videoDiv").hide();
            $("#videoBr").hide();
        }
    }

    var format_search =  [
        /\[b\](.*?)\[\/b\]/ig,
        /\[i\](.*?)\[\/i\]/ig,
        /\[url\](.*?)\[\/url\]/ig,
        /\[img\](.*?)\[\/img\]/ig,
        /\[code\](.*?)\[\/code\]/ig
    ];

    var format_replace = [
        '<strong>$1</strong>',
        '<em>$1</em>',
        '<a href="http://$1">$1</a>',
        '<img src="/$1" class="img-responsive" />',
        '<pre class="pre-scrollable">$1</pre>'
    ];

    function htmlEncode(value){
        if (value) {
            return jQuery('<div />').text(value).html();
        } else {
            return '';
        }
    }

    function nl2br (str, is_xhtml) {
        var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
    }
</script>