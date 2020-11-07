export default class ProductClass{

    constructor(
        product_id,
        product_name,
        product_img,
        product_price,
        product_quantity,
        product_company,
        product_category,
        category_name,
        product_availability,
        product_trending,
        product_description,
        created_at,
        updated_at){
            this.product_id = product_id,
            this.product_name = product_name;
            this.product_img = product_img;
            this.product_price = product_price;
            this.product_quantity = product_quantity;
            this.product_compny = product_company;
            this.product_category = product_category;
            this.category_name = category_name;
            this.product_availability = product_availability;
            this.product_trending = product_trending;
            this.product_description = product_description;
            this.created_at = created_at;
            this.updated_at = updated_at;
        }
}