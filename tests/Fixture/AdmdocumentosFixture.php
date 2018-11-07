<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AdmdocumentosFixture
 *
 */
class AdmdocumentosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'CIDDOCUMENTO' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CIDDOCUMENTODE' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CIDCONCEPTODOCUMENTO' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CSERIEDOCUMENTO' => ['type' => 'string', 'length' => '11', 'null' => false, 'default' => '', 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'CFOLIO' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CFECHA' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => '18991230', 'precision' => null, 'comment' => null],
        'CIDCLIENTEPROVEEDOR' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CRAZONSOCIAL' => ['type' => 'string', 'length' => '60', 'null' => false, 'default' => '', 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'CRFC' => ['type' => 'string', 'length' => '20', 'null' => false, 'default' => '', 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'CIDAGENTE' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CFECHAVENCIMIENTO' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => '18991230', 'precision' => null, 'comment' => null],
        'CFECHAPRONTOPAGO' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => '18991230', 'precision' => null, 'comment' => null],
        'CFECHAENTREGARECEPCION' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => '18991230', 'precision' => null, 'comment' => null],
        'CFECHAULTIMOINTERES' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => '18991230', 'precision' => null, 'comment' => null],
        'CIDMONEDA' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CTIPOCAMBIO' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CREFERENCIA' => ['type' => 'string', 'length' => '20', 'null' => false, 'default' => '', 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'COBSERVACIONES' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null],
        'CNATURALEZA' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CIDDOCUMENTOORIGEN' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CPLANTILLA' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CUSACLIENTE' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CUSAPROVEEDOR' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CAFECTADO' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CIMPRESO' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CCANCELADO' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CDEVUELTO' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CIDPREPOLIZA' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CIDPREPOLIZACANCELACION' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CESTADOCONTABLE' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CNETO' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CIMPUESTO1' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CIMPUESTO2' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CIMPUESTO3' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CRETENCION1' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CRETENCION2' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CDESCUENTOMOV' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CDESCUENTODOC1' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CDESCUENTODOC2' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CGASTO1' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CGASTO2' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CGASTO3' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CTOTAL' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CPENDIENTE' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CTOTALUNIDADES' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CDESCUENTOPRONTOPAGO' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CPORCENTAJEIMPUESTO1' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CPORCENTAJEIMPUESTO2' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CPORCENTAJEIMPUESTO3' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CPORCENTAJERETENCION1' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CPORCENTAJERETENCION2' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CPORCENTAJEINTERES' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CTEXTOEXTRA1' => ['type' => 'string', 'length' => '50', 'null' => false, 'default' => '', 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'CTEXTOEXTRA2' => ['type' => 'string', 'length' => '50', 'null' => false, 'default' => '', 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'CTEXTOEXTRA3' => ['type' => 'string', 'length' => '50', 'null' => false, 'default' => '', 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'CFECHAEXTRA' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => '18991230', 'precision' => null, 'comment' => null],
        'CIMPORTEEXTRA1' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CIMPORTEEXTRA2' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CIMPORTEEXTRA3' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CIMPORTEEXTRA4' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CDESTINATARIO' => ['type' => 'string', 'length' => '60', 'null' => false, 'default' => '', 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'CNUMEROGUIA' => ['type' => 'string', 'length' => '60', 'null' => false, 'default' => '', 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'CMENSAJERIA' => ['type' => 'string', 'length' => '20', 'null' => false, 'default' => '', 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'CCUENTAMENSAJERIA' => ['type' => 'string', 'length' => '120', 'null' => false, 'default' => '', 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'CNUMEROCAJAS' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CPESO' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CBANOBSERVACIONES' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CBANDATOSENVIO' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CBANCONDICIONESCREDITO' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CBANGASTOS' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CUNIDADESPENDIENTES' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CTIMESTAMP' => ['type' => 'string', 'length' => '23', 'null' => false, 'default' => '', 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'CIMPCHEQPAQ' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CSISTORIG' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CIDMONEDCA' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CTIPOCAMCA' => ['type' => 'float', 'length' => null, 'null' => false, 'default' => '0.00', 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CESCFD' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CTIENECFD' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CLUGAREXPE' => ['type' => 'string', 'length' => '380', 'null' => false, 'default' => '', 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'CMETODOPAG' => ['type' => 'string', 'length' => '100', 'null' => false, 'default' => '', 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'CNUMPARCIA' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CCANTPARCI' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'CCONDIPAGO' => ['type' => 'string', 'length' => '100', 'null' => false, 'default' => '', 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'CNUMCTAPAG' => ['type' => 'string', 'length' => '100', 'null' => false, 'default' => '', 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'CGUIDDOCUMENTO' => ['type' => 'string', 'length' => '40', 'null' => false, 'default' => '', 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'CUSUARIO' => ['type' => 'string', 'length' => '15', 'null' => false, 'default' => '', 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'CIDPROYECTO' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => '0', 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_indexes' => [
            'CFECHA' => ['type' => 'index', 'columns' => ['CFECHA', 'CIDDOCUMENTO'], 'length' => []],
            'CFECHAVENCIMIENTO' => ['type' => 'index', 'columns' => ['CFECHAVENCIMIENTO', 'CIDDOCUMENTO'], 'length' => []],
            'CIDDOCUMENTOORIGEN' => ['type' => 'index', 'columns' => ['CIDDOCUMENTOORIGEN', 'CIDDOCUMENTO'], 'length' => []],
            'CIDMONEDA' => ['type' => 'index', 'columns' => ['CIDMONEDA', 'CIDDOCUMENTO'], 'length' => []],
            'CIDPREPOLIZA' => ['type' => 'index', 'columns' => ['CIDPREPOLIZA', 'CIDDOCUMENTO'], 'length' => []],
            'IAGENTEFECHASERIEFOLIO' => ['type' => 'index', 'columns' => ['CIDAGENTE', 'CFECHA', 'CSERIEDOCUMENTO', 'CFOLIO', 'CIDDOCUMENTO'], 'length' => []],
            'ICLIENTEPROVEEDORFECHA' => ['type' => 'index', 'columns' => ['CIDCLIENTEPROVEEDOR', 'CFECHA', 'CSERIEDOCUMENTO', 'CFOLIO', 'CIDDOCUMENTO'], 'length' => []],
            'ICLIENTEPROVCPTOFECHA' => ['type' => 'index', 'columns' => ['CIDCLIENTEPROVEEDOR', 'CIDCONCEPTODOCUMENTO', 'CFECHA', 'CSERIEDOCUMENTO', 'CFOLIO'], 'length' => []],
            'ICLIENTEPROVAFECTANATVENC' => ['type' => 'index', 'columns' => ['CIDCLIENTEPROVEEDOR', 'CAFECTADO', 'CNATURALEZA', 'CFECHAVENCIMIENTO', 'CIDDOCUMENTO'], 'length' => []],
            'ICLIPENFEC' => ['type' => 'index', 'columns' => ['CIDCLIENTEPROVEEDOR', 'CPENDIENTE', 'CAFECTADO', 'CNATURALEZA', 'CFECHAVENCIMIENTO', 'CIDDOCUMENTO'], 'length' => []],
            'ICONCEPTOFECHA' => ['type' => 'index', 'columns' => ['CIDCONCEPTODOCUMENTO', 'CFECHA', 'CSERIEDOCUMENTO', 'CFOLIO'], 'length' => []],
            'ICONCEPTOFOLIO' => ['type' => 'index', 'columns' => ['CIDCONCEPTODOCUMENTO', 'CFOLIO', 'CIDDOCUMENTO'], 'length' => []],
            'ICTEDOCTODEFECVENCCHQW' => ['type' => 'index', 'columns' => ['CIDCLIENTEPROVEEDOR', 'CIDDOCUMENTODE', 'CFECHAVENCIMIENTO', 'CIDDOCUMENTO'], 'length' => []],
            'ICTEPROVNATPEN' => ['type' => 'index', 'columns' => ['CIDCLIENTEPROVEEDOR', 'CNATURALEZA', 'CPENDIENTE', 'CIDDOCUMENTO'], 'length' => []],
            'IDOCTODESERIEFOLIO' => ['type' => 'index', 'columns' => ['CIDDOCUMENTODE', 'CSERIEDOCUMENTO', 'CFOLIO', 'CIDDOCUMENTO'], 'length' => []],
            'IDOCTODEDOCTOORIGEN' => ['type' => 'index', 'columns' => ['CIDDOCUMENTODE', 'CIDDOCUMENTOORIGEN', 'CIDDOCUMENTO'], 'length' => []],
            'IDOCUMENTODEFECHASERIEFOL' => ['type' => 'index', 'columns' => ['CIDDOCUMENTODE', 'CFECHA', 'CSERIEDOCUMENTO', 'CFOLIO'], 'length' => []],
            'IDOCUMENTODECLIENTEFECHA' => ['type' => 'index', 'columns' => ['CIDDOCUMENTODE', 'CIDCLIENTEPROVEEDOR', 'CFECHA', 'CSERIEDOCUMENTO', 'CFOLIO'], 'length' => []],
            'IDOCUMENTODEAGENTEFECHA' => ['type' => 'index', 'columns' => ['CIDDOCUMENTODE', 'CIDAGENTE', 'CFECHA', 'CSERIEDOCUMENTO', 'CFOLIO'], 'length' => []],
            'IBANCOS' => ['type' => 'index', 'columns' => ['CNUMEROGUIA', 'CDESTINATARIO', 'CIDDOCUMENTO'], 'length' => []],
            'CSISTORIG' => ['type' => 'index', 'columns' => ['CSISTORIG', 'CIDDOCUMENTO'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['CIDDOCUMENTO'], 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'CIDDOCUMENTO' => 1,
            'CIDDOCUMENTODE' => 1,
            'CIDCONCEPTODOCUMENTO' => 1,
            'CSERIEDOCUMENTO' => 'Lorem ips',
            'CFOLIO' => 1,
            'CFECHA' => 1501786596,
            'CIDCLIENTEPROVEEDOR' => 1,
            'CRAZONSOCIAL' => 'Lorem ipsum dolor sit amet',
            'CRFC' => 'Lorem ipsum dolor ',
            'CIDAGENTE' => 1,
            'CFECHAVENCIMIENTO' => 1501786596,
            'CFECHAPRONTOPAGO' => 1501786596,
            'CFECHAENTREGARECEPCION' => 1501786596,
            'CFECHAULTIMOINTERES' => 1501786596,
            'CIDMONEDA' => 1,
            'CTIPOCAMBIO' => 1,
            'CREFERENCIA' => 'Lorem ipsum dolor ',
            'COBSERVACIONES' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'CNATURALEZA' => 1,
            'CIDDOCUMENTOORIGEN' => 1,
            'CPLANTILLA' => 1,
            'CUSACLIENTE' => 1,
            'CUSAPROVEEDOR' => 1,
            'CAFECTADO' => 1,
            'CIMPRESO' => 1,
            'CCANCELADO' => 1,
            'CDEVUELTO' => 1,
            'CIDPREPOLIZA' => 1,
            'CIDPREPOLIZACANCELACION' => 1,
            'CESTADOCONTABLE' => 1,
            'CNETO' => 1,
            'CIMPUESTO1' => 1,
            'CIMPUESTO2' => 1,
            'CIMPUESTO3' => 1,
            'CRETENCION1' => 1,
            'CRETENCION2' => 1,
            'CDESCUENTOMOV' => 1,
            'CDESCUENTODOC1' => 1,
            'CDESCUENTODOC2' => 1,
            'CGASTO1' => 1,
            'CGASTO2' => 1,
            'CGASTO3' => 1,
            'CTOTAL' => 1,
            'CPENDIENTE' => 1,
            'CTOTALUNIDADES' => 1,
            'CDESCUENTOPRONTOPAGO' => 1,
            'CPORCENTAJEIMPUESTO1' => 1,
            'CPORCENTAJEIMPUESTO2' => 1,
            'CPORCENTAJEIMPUESTO3' => 1,
            'CPORCENTAJERETENCION1' => 1,
            'CPORCENTAJERETENCION2' => 1,
            'CPORCENTAJEINTERES' => 1,
            'CTEXTOEXTRA1' => 'Lorem ipsum dolor sit amet',
            'CTEXTOEXTRA2' => 'Lorem ipsum dolor sit amet',
            'CTEXTOEXTRA3' => 'Lorem ipsum dolor sit amet',
            'CFECHAEXTRA' => 1501786596,
            'CIMPORTEEXTRA1' => 1,
            'CIMPORTEEXTRA2' => 1,
            'CIMPORTEEXTRA3' => 1,
            'CIMPORTEEXTRA4' => 1,
            'CDESTINATARIO' => 'Lorem ipsum dolor sit amet',
            'CNUMEROGUIA' => 'Lorem ipsum dolor sit amet',
            'CMENSAJERIA' => 'Lorem ipsum dolor ',
            'CCUENTAMENSAJERIA' => 'Lorem ipsum dolor sit amet',
            'CNUMEROCAJAS' => 1,
            'CPESO' => 1,
            'CBANOBSERVACIONES' => 1,
            'CBANDATOSENVIO' => 1,
            'CBANCONDICIONESCREDITO' => 1,
            'CBANGASTOS' => 1,
            'CUNIDADESPENDIENTES' => 1,
            'CTIMESTAMP' => 'Lorem ipsum dolor sit',
            'CIMPCHEQPAQ' => 1,
            'CSISTORIG' => 1,
            'CIDMONEDCA' => 1,
            'CTIPOCAMCA' => 1,
            'CESCFD' => 1,
            'CTIENECFD' => 1,
            'CLUGAREXPE' => 'Lorem ipsum dolor sit amet',
            'CMETODOPAG' => 'Lorem ipsum dolor sit amet',
            'CNUMPARCIA' => 1,
            'CCANTPARCI' => 1,
            'CCONDIPAGO' => 'Lorem ipsum dolor sit amet',
            'CNUMCTAPAG' => 'Lorem ipsum dolor sit amet',
            'CGUIDDOCUMENTO' => 'Lorem ipsum dolor sit amet',
            'CUSUARIO' => 'Lorem ipsum d',
            'CIDPROYECTO' => 1
        ],
    ];
}
