<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *    @author Municipio de Itajaí - Secretaria de Educação - DITEC         *
 *    @updated 30/06/2016                                                  *
 *    Pacote: Erudio                                                       *
 *                                                                         *
 *    Copyright (C) 2016 Prefeitura de Itajaí - Secretaria de Educação     *
 *                       DITEC - Diretoria de Tecnologias educacionais     *
 *                        ditec@itajai.sc.gov.br                           *
 *                                                                         *
 *    Este  programa  é  software livre, você pode redistribuí-lo e/ou     *
 *    modificá-lo sob os termos da Licença Pública Geral GNU, conforme     *
 *    publicada pela Free  Software  Foundation,  tanto  a versão 2 da     *
 *    Licença   como  (a  seu  critério)  qualquer  versão  mais  nova.    *
 *                                                                         *
 *    Este programa  é distribuído na expectativa de ser útil, mas SEM     *
 *    QUALQUER GARANTIA. Sem mesmo a garantia implícita de COMERCIALI-     *
 *    ZAÇÃO  ou  de ADEQUAÇÃO A QUALQUER PROPÓSITO EM PARTICULAR. Con-     *
 *    sulte  a  Licença  Pública  Geral  GNU para obter mais detalhes.     *
 *                                                                         *
 *    Você  deve  ter  recebido uma cópia da Licença Pública Geral GNU     *
 *    junto  com  este  programa. Se não, escreva para a Free Software     *
 *    Foundation,  Inc.,  59  Temple  Place,  Suite  330,  Boston,  MA     *
 *    02111-1307, USA.                                                     *
 *                                                                         *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

namespace PessoaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use PessoaBundle\Entity\Pessoa;
use PessoaBundle\Entity\EstadoCivil;

/**
 * @ORM\Entity
 * @ORM\Table(name = "sme_pessoa_fisica")
 */
class PessoaFisica extends Pessoa {
    
    const NACIONALIDADE_BRASILEIRA = "BRASILEIRO",
          NACIONALIDADE_NATURALIZADA = "ESTRANGEIRO_NATURALIZADO",
          NACIONALIDADE_ESTRANGEIRA = "ESTRANGEIRO";
    
    /**
    * @JMS\Groups({"DETAILS"})
    * @ORM\Column(name = "rg_numero", nullable = true) 
    */
    private $numeroRg;
    
    /**
    * @JMS\Groups({"DETAILS"})
    * @ORM\Column(name = "rg_orgao_expedidor", nullable = true) 
    */
    private $orgaoExpedidorRg;
    
    /** 
    * @JMS\Type("DateTime<'Y-m-d'>")
    * @JMS\Groups({"DETAILS"})
    * @ORM\Column(name = "rg_data_expedicao", type="date", nullable = true) 
    */
    private $dataExpedicaoRg;
    
    /**
    * @JMS\Groups({"DETAILS"}) 
    * @ORM\Column(nullable = true) 
    */
    private $nis;
    
    /**
    * @JMS\Groups({"DETAILS"}) 
    * @ORM\Column(name = "pis_pasep", nullable = true) 
    */
    private $pisPasep;
    
    /**
    * @JMS\Groups({"DETAILS"}) 
    * @ORM\Column(name="cns", nullable = true) 
    */
    private $cns;
    
    /**
    * @JMS\Groups({"DETAILS"})
    * @ORM\Column(name = "nacionalidade_tipo") 
    */
    private $nacionalidade;
    
    /** 
    * @JMS\Groups({"DETAILS"})
    * @ORM\ManyToOne(targetEntity = "Pais") 
    * @ORM\JoinColumn(name = "pais_nacionalidade_id", referencedColumnName = "id") 
    */
    private $paisOrigem;
    
    /**
    * @JMS\Groups({"DETAILS"})
    * @ORM\Column(name = "certidao_nascimento_completa", length = 32, nullable = true) 
    */
    private $certidaoNascimento;
    
    /**
    * @JMS\Groups({"DETAILS"})
    * @JMS\Type("DateTime<'Y-m-d'>")  
    * @ORM\Column(name = "certidao_nascimento_data_expedicao", type = "date", nullable = true) 
    */
    private $dataExpedicaoCertidaoNascimento;
    
    /**
    * @JMS\Groups({"DETAILS"})
    * @ORM\Column(name = "mae_nome", nullable = true)
    */
    private $nomeMae;
    
    /**
    * @JMS\Groups({"DETAILS"}) 
    * @ORM\Column(name = "pai_nome", nullable = true) 
    */
    private $nomePai;
    
    /**
     * @JMS\Groups({"LIST"})  
     * @ORM\Column(name = "responsavel_nome", nullable = true)
     */
    private $responsavelNome;
    
    /** 
    * @JMS\Groups({"DETAILS"})
    * @ORM\ManyToOne(targetEntity = "Cidade") 
    * @ORM\JoinColumn(name = "cidade_nascimento_id")
    */
    private $naturalidade;
    
    /**
    * @JMS\Groups({"DETAILS"})
    * @ORM\ManyToOne(targetEntity = "EstadoCivil")
    * @ORM\JoinColumn(name = "estado_civil_id", nullable = false)
    */
    private $estadoCivil;
    
    /**
    * @JMS\Groups({"DETAILS"})
    * @ORM\ManyToOne(targetEntity = "Raca")
    * @ORM\JoinColumn(name = "raca_id", nullable = false) 
    */
    private $raca;
    
    /** 
    * @JMS\Groups({"DETAILS"})
    * @ORM\Column(name = "carteira_trabalho_numero", nullable = true) 
    */
    private $carteiraTrabalhoNumero;
    
    /** 
    * @JMS\Groups({"DETAILS"})
    * @ORM\Column(name = "carteira_trabalho_serie", nullable = true) 
    */
    private $carteiraTrabalhoSerie;
    
    /**
    * @JMS\Groups({"DETAILS"})
    * @ORM\Column(name = "carteira_trabalho_data_expedicao", type = "date", nullable = true) 
    */
    private $carteiraTrabalhoDataExepdicao;
    
    /**
    * @JMS\Groups({"DETAILS"})
    * @ORM\ManyToOne(targetEntity = "Estado")
    * @ORM\JoinColumn(name = "carteira_trabalho_estado_id") 
    */
    private $carteiraTrabalhoEstado;
    
    /**
     * @JMS\Groups({"LIST"}) 
     * @ORM\Column(type = "boolean")
     */
    private $alfabetizado = false;
    
    /**
    * @JMS\Groups({"DETAILS", "DEFICIENCIAS"})
    * @ORM\ManyToMany(targetEntity="Particularidade")
    * @ORM\JoinTable(name="sme_pessoa_fisica_particularidade",
    *      joinColumns={@ORM\JoinColumn(name="pessoa_fisica_id", referencedColumnName="id")},
    *      inverseJoinColumns={@ORM\JoinColumn(name="particularidade_id", referencedColumnName="id")}
    *   )
    */
    private $particularidades;
    
    /**
    * @JMS\Groups({"DETAILS"})
    * @ORM\ManyToMany(targetEntity="NecessidadeEspecial")
    * @ORM\JoinTable(name="sme_pessoa_fisica_necessidade_especial",
    *      joinColumns={@ORM\JoinColumn(name="pessoa_fisica_id", referencedColumnName="id")},
    *      inverseJoinColumns={@ORM\JoinColumn(name="necessidade_especial_id", referencedColumnName="id")}
    *   )
    */
    private $necessidadesEspeciais;
    
    /**
    * @JMS\Groups({"DETAILS"})
    * @ORM\ManyToMany(targetEntity="BeneficioSocial")
    * @ORM\JoinTable(name="edu_pessoa_fisica_beneficio_social",
    *      joinColumns={@ORM\JoinColumn(name="pessoa_fisica_id", referencedColumnName="id")},
    *      inverseJoinColumns={@ORM\JoinColumn(name="beneficio_social_id", referencedColumnName="id")}
    *   )
    */
    private $beneficiosSociais;
    
    function __construct() {
        parent::__construct();
    }
    
    /**
    * @JMS\Groups({"LIST"})
    * @JMS\VirtualProperty
    */
    function getCodigo() {
        $anoCadastro = $this->getDataCadastro() ? $this->getDataCadastro()->format('y') : date('y');
        return "{$this->getId()}-{$anoCadastro}";
    }
    
    function getResponsavelNome() {
        return $this->responsavelNome;
    }
    
    function setResponsavelNome($responsavelNome) {
        $this->responsavelNome = $responsavelNome;
    }
    
    function getIdade() {
        return (new \DateTime())->diff($this->getDataNascimento());
    }
    
    function getNumeroRg() {
        return $this->numeroRg;
    }

    function getOrgaoExpedidorRg() {
        return $this->orgaoExpedidorRg;
    }

    function getDataExpedicaoRg() {
        return $this->dataExpedicaoRg;
    }

    function getNis() {
        return $this->nis;
    }
    
    function getPisPasep() {
        return $this->pisPasep;
    }
    
    function getCns() {
        return $this->cns;
    }

    function getNaturalidade() {
        return $this->naturalidade;
    }

    function getNacionalidade() {
        return $this->nacionalidade;
    }
    
    function getPaisOrigem() {
        return $this->paisOrigem;
    }

    function getCertidaoNascimento() {
        return $this->certidaoNascimento;
    }
        
    function getDataExpedicaoCertidaoNascimento() {
        return $this->dataExpedicaoCertidaoNascimento;
    }

    function getNomeMae() {
        return $this->nomeMae;
    }

    function getNomePai() {
        return $this->nomePai;
    }

    function getRaca() {
        return $this->raca;
    }

    function getEstadoCivil() {
        return $this->estadoCivil;
    }

    function getCarteiraTrabalhoNumero() {
        return $this->carteiraTrabalhoNumero;
    }

    function getCarteiraTrabalhoSerie() {
        return $this->carteiraTrabalhoSerie;
    }

    function getCarteiraTrabalhoDataExepdicao() {
        return $this->carteiraTrabalhoDataExepdicao;
    }

    function getCarteiraTrabalhoEstado() {
        return $this->carteiraTrabalhoEstado;
    }
    
    function getParticularidades() {
        return $this->particularidades;
    }
    
    function getNecessidadesEspeciais() {
        return $this->necessidadesEspeciais;
    }

    function setNumeroRg($numeroRg) {
        $this->numeroRg = $numeroRg;
    }

    function setOrgaoExpedidorRg($orgaoExpedidorRg) {
        $this->orgaoExpedidorRg = $orgaoExpedidorRg;
    }

    function setDataExpedicaoRg(\DateTime $dataExpedicaoRg) {
        $this->dataExpedicaoRg = $dataExpedicaoRg;
    }

    function setNis($nis) {
        $this->nis = $nis;
    }
    
    function setPisPasep($pisPasep) {
        $this->pisPasep = $pisPasep;
    }
    
    function setCns($cns) {
        $this->cns = $cns;
    }

    function setNaturalidade($naturalidade) {
        $this->naturalidade = $naturalidade;
    }

    function setNacionalidade($nacionalidade) {
        $this->nacionalidade = $nacionalidade;
    }
    
    function setPaisOrigem($paisOrigem) {
        $this->paisOrigem = $paisOrigem;
    }

    function setCertidaoNascimento($certidaoNascimento) {
        $this->certidaoNascimento = $certidaoNascimento;
    }

    function setDataExpedicaoCertidaoNascimento(\DateTime $dataExpedicaoCertidaoNascimento) {
        $this->dataExpedicaoCertidaoNascimento = $dataExpedicaoCertidaoNascimento;
    }

    function setNomeMae($nomeMae) {
        $this->nomeMae = $nomeMae;
    }

    function setNomePai($nomePai) {
        $this->nomePai = $nomePai;
    }

    function setRaca(Raca $raca) {
        $this->raca = $raca;
    }

    function setEstadoCivil(EstadoCivil $estadoCivil) {
        $this->estadoCivil = $estadoCivil;
    }

    function setCarteiraTrabalhoNumero($carteiraTrabalhoNumero) {
        $this->carteiraTrabalhoNumero = $carteiraTrabalhoNumero;
    }

    function setCarteiraTrabalhoSerie($carteiraTrabalhoSerie) {
        $this->carteiraTrabalhoSerie = $carteiraTrabalhoSerie;
    }

    function setCarteiraTrabalhoDataExepdicao(\DateTime $carteiraTrabalhoDataExepdicao = null) {
        $this->carteiraTrabalhoDataExepdicao = $carteiraTrabalhoDataExepdicao;
    }

    function setCarteiraTrabalhoEstado(Estado $carteiraTrabalhoEstado = null) {
        $this->carteiraTrabalhoEstado = $carteiraTrabalhoEstado;
    }
    
    function setParticularidades($particularidades) {
        $this->particularidades = $particularidades;
    }
    
    function setNecessidadesEspeciais($necessidadesEspeciais) {
        $this->necessidadesEspeciais = $necessidadesEspeciais;
    }

    function getAlfabetizado() {
        return $this->alfabetizado;
    }

    function setAlfabetizado($alfabetizado) {
        $this->alfabetizado = $alfabetizado;
    }
    
    function getBeneficiosSociais() {
        return $this->beneficiosSociais;
    }

    function setBeneficiosSociais($beneficiosSociais) {
        $this->beneficiosSociais = $beneficiosSociais;
    }

}
