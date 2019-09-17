<?
    interface IProduct {
        function getName(): string;
    }

    interface ISingleProduct extends IProduct {
        function getTotalPrice(): float;
        function getInfo(): string;
    }

    interface IWeightProduct extends IProduct {
        function getTotalPrice($weight): float;
        function getInfo($weight): string;
    }

    abstract class AbstractProduct {
        protected $price;
        protected $name;

        public function __construct($name, $price) {
            $this->name = $name;
            $this->price = $price;
        }

        public function getName(): string {
            return $name;
        }
    }

    abstract class AbstractSingleProduct extends AbstractProduct implements ISingleProduct {
        public function getInfo(): string {
            return "{$this->name} product has {$this->getTotalPrice()} total price";
        }
    }

    abstract class AbstractWeightProduct extends AbstractProduct implements IWeightProduct {
        public function getInfo($weight): string {
            return "{$this->name} product has {$this->getTotalPrice($weight)} total price";
        }
    }

    class DigitalProduct extends AbstractSingleProduct {
        public function getTotalPrice(): float {
            return $this->price / 2;
        }
    }

    class RetailProduct extends AbstractSingleProduct {
        public function getTotalPrice(): float {
            return $this->price;
        }
    }

    class WeightProduct extends AbstractWeightProduct {
        public function getTotalPrice($weight): float {
            return $this->price * $weight;
        }
    }

    $dp = new DigitalProduct('Product1', 100);
    echo $dp->getInfo() . '<BR>';

    $rp = new RetailProduct('Product2', 100);
    echo $rp->getInfo() . '<BR>';

    $wp = new WeightProduct('Product3', 100);
    echo $wp->getInfo(3) . '<BR>';


