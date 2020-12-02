package org.ufg.vacinei;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.web.servlet.config.annotation.EnableWebMvc;
import org.ufg.vacinei.config.ConfigPackage;
import org.ufg.vacinei.controller.ControllerPackage;
import org.ufg.vacinei.service.ServicePackage;

@SpringBootApplication
@EnableWebMvc
@ComponentScan(basePackageClasses = {ControllerPackage.class, ServicePackage.class, ConfigPackage.class})
public class VacineiApplication {
	
	public static void main(String[] args) {
		SpringApplication.run(VacineiApplication.class, args);
	}
	
}
