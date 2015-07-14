package com.bt.cart.entity;

import java.util.Date;

import javax.persistence.Column;
import javax.persistence.MappedSuperclass;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

@MappedSuperclass
public class BaseEntity {
	
	@Temporal(TemporalType.DATE)
	@Column(insertable=true, updatable=false)
	private Date createdDate;
	
	@Temporal(TemporalType.DATE)
	@Column(insertable=false, updatable=true)
	private Date modifieddate;
	
	
	public Date getCreatedDate() {
		return createdDate;
	}
	public void setCreatedDate(Date createdDate) {
		this.createdDate = createdDate;
	}
	public Date getModifieddate() {
		return modifieddate;
	}
	public void setModifieddate(Date modifieddate) {
		this.modifieddate = modifieddate;
	}
	
	
	
	

}
