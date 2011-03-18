<?php
/*=======================================================================
 // File:        JPGRAPH_ERROR.PHP
 // Description: Error plot extension for JpGraph
 // Created:     2001-01-08
 // Ver:         $Id: jpgraph_error.php 1106 2009-02-22 20:16:35Z ljp $
 //
 // Copyright (c) Aditus Consulting. All rights reserved.
 //========================================================================
 */
   
//===================================================
// CLASS ErrorPlot
// Description: Error plot with min/max value for
// each datapoint
//===================================================
class ErrorPlot extends Plot {
    private $errwidth=2;
    
    //---------------
    // CONSTRUCTOR
    function __construct($datay,$datax=false) {
        parent::__construct($datay,$datax);
        $this->numpoints /= 2;
    }
    //---------------
    // PUBLIC METHODS

    // Gets called before any axis are stroked
    function PreStrokeAdjust($graph) {
        if( $this->center ) {
            $a=0.5; $b=0.5;
            ++$this->numpoints;
        } else {
            $a=0; $b=0;
        }
        $graph->xaxis->scale->ticks->SetXLabelOffset($a);
        $graph->SetTextScaleOff($b);
        //$graph->xaxis->scale->ticks->SupressMinorTickMarks();
    }

    // Method description
    function Stroke($img,$xscale,$yscale) {
        $numpoints=count($this->coords[0])/2;
        $img->SetColor($this->color);
        $img->SetLineWeight($this->weight);

        if( isset($this->coords[1]) ) {
            if( count($this->coords[1])!=$numpoints )
            JpGraphError::RaiseL(2003,count($this->coords[1]),$numpoints);
            //("Number of X and Y points are not equal. Number of X-points:".count($this->coords[1])." Number of Y-points:$numpoints");
            else
            $exist_x = true;
        }
        else
        $exist_x = false;

        for( $i=0; $i<$numpoints; ++$i) {
            if( $exist_x )
            $x=$this->coords[1][$i];
            else
            $x=$i;

            if( !is_numeric($x) ||
            !is_numeric($this->coords[0][$i*2]) || !is_numeric($this->coords[0][$i*2+1]) ) {
                continue;
            }

            $xt = $xscale->Translate($x);
            $yt1 = $yscale->Translate($this->coords[0][$i*2]);
            $yt2 = $yscale->Translate($this->coords[0][$i*2+1]);
            $img->Line($xt,$yt1,$xt,$yt2);
            $img->Line($xt-$this->errwidth,$yt1,$xt+$this->errwidth,$yt1);
            $img->Line($xt-$this->errwidth,$yt2,$xt+$this->errwidth,$yt2);
        }
        return true;
    }
} // Class


//===================================================
// CLASS ErrorLinePlot
// Description: Combine a line and error plot
// THIS IS A DEPRECATED PLOT TYPE JUST KEPT FOR
// BACKWARD COMPATIBILITY
//===================================================
class ErrorLinePlot extends ErrorPlot {
    public $line=null;
    //---------------
    // CONSTRUCTOR
    function __construct($datay,$datax=false) {
        parent::__construct($datay,$datax);
        // Calculate line coordinates as the average of the error limits
        $n = count($datay);
        for($i=0; $i < $n; $i+=2 ) {
            $ly[]=($datay[$i]+$datay[$i+1])/2;
        }
        $this->line=new LinePlot($ly,$datax);
    }

    //---------------
    // PUBLIC METHODS
    function Legend($graph) {
        if( $this->legend != "" )
        $graph->legend->Add($this->legend,$this->color);
        $this->line->Legend($graph);
    }
     
    function Stroke($img,$xscale,$yscale) {
        parent::Stroke($img,$xscale,$yscale);
        $this->line->Stroke($img,$xscale,$yscale);
    }
} // Class


//===================================================
// CLASS LineErrorPlot
// Description: Combine a line and error plot
//===================================================
class LineErrorPlot extends ErrorPlot {
    public $line=null;
    //---------------
    // CONSTRUCTOR
    // Data is (val, errdeltamin, errdeltamax)
    function __construct($datay,$datax=false) {
        $ly=array(); $ey=array();
        $n = count($datay);
        if( $n % 3 != 0 ) {
            JpGraphError::RaiseL(4002);
            //('Error in input data to LineErrorPlot. Number of data points must be a multiple of 3');
        }
        for($i=0; $i < $n; $i+=3 ) {
            $ly[]=$datay[$i];
            $ey[]=$datay[$i]+$datay[$i+1];
            $ey[]=$datay[$i]+$datay[$i+2];
        }
        parent::__construct($ey,$datax);
        $this->line=new LinePlot($ly,$datax);
    }

    //---------------
    // PUBLIC METHODS
    function Legend($graph) {
        if( $this->legend != "" )
        $graph->legend->Add($this->legend,$this->color);
        $this->line->Legend($graph);
    }
     
    function Stroke($img,$xscale,$yscale) {
        parent::Stroke($img,$xscale,$yscale);
        $this->line->Stroke($img,$xscale,$yscale);
    }
} // Class


/* EOF */
?><?
/*
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前己经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>