alter table `product` add constraint `product_shop_fk` foreign key(`shop_id`) references `shop`(`idx`) on delete cascade on update cascade;
alter table `cart` add constraint `cart_user_fk` foreign key(`user_id`) references `user`(`idx`) on delete cascade on update cascade;
alter table `cart` add constraint `cart_product_fk` foreign key(`product_id`) references `product`(`idx`) on delete cascade on update cascade;
alter table `cart` add constraint `cart_cart_manager_fk` foreign key(`cart_manager_id`) references `cart_manager`(`cart_manager_id`) on delete cascade on update cascade;
alter table `order` add constraint `order_user_fk` foreign key(`user_id`) references `user`(`idx`) on delete cascade on update cascade;
alter table `order` add constraint `order_shop_fk` foreign key(`shop_id`) references `shop`(`idx`) on delete cascade on update cascade;
alter table `delivery` add constraint `delivery_user_fk` foreign key(`user_id`) references `user`(`idx`) on delete cascade on update cascade;
alter table `delivery` add constraint `delivery_order_fk` foreign key(`order_id`) references `order`(`idx`) on delete cascade on update cascade;
alter table `delivery` add constraint `deliveery_shop_fk` foreign key(`shop_id`) references `shop`(`idx`) on delete cascade on update cascade;
alter table `refund` add constraint `refund_user_fk` foreign key(`user_id`) references `user`(`idx`) on delete cascade on update cascade;
alter table `refund` add constraint `refund_order_fk` foreign key(`order_id`) references `order`(`idx`) on delete cascade on update cascade;
alter table `refund` add constraint `refund_shop_fk` foreign key(`shop_id`) references `shop`(`idx`) on delete cascade on update cascade;
alter table `refund` add constraint `refund_delivery_fk` foreign key(`delivery_id`) references `delivery`(`idx`) on delete cascade on update cascade;